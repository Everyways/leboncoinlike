<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Repositories\{AdRepository, MessageRepository};
use App\Http\Requests\MessageRefuseRequest;
use App\Models\{AppModelsAd as Ad, AppModelsMessage as Message};
use App\Notifications\{AdApprove, AdRefuse, MessageApprove, AdMessage, Messagerefuse};


class AdminController extends Controller
{

    /**
     * Ad repository.
     *
     * @var App\Repositories\AdRepository
     */
    protected $adRepository;

    /**
     * Message repository.
     *
     * @var App\Repositories\Messagerepository
     */
    protected $messagerepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AdRepository $adRepository, Messagerepository $messagerepository)
    {
        $this->adRepository = $adRepository;
        $this->messagerepository = $messagerepository;
    }

    /**
     * Display a listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adModerationCount = $this->adRepository->noActiveCount();
        $adPerimesCount = $this->adRepository->obsoleteCount();
        $messageModerationCount = $this->messagerepository->count();

        return view('admin.index', compact('adModerationCount', 'messageModerationCount', 'adPerimesCount'));
    }

    /**
     * Display ads to approve.
     *
     * @return \Illuminate\Http\Response
     */
    public function ads()
    {
        $adModeration = $this->adRepository->noActive(5);

        return view('admin.ads', compact('adModeration'));
    }

    /**
     * Approve an ad.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function approve(Request $request, Ad $ad)
    {
        $this->adRepository->approve($ad);
        $request->session()->flash('status', "L'annonce a bien été approuvée et le rédacteur va être notifié.");
        $ad->notify(new AdApprove($ad));

        return response()->json(['id' => $ad->id]);
    }

    /**
     * Deny an ad.
     *
     * @param  App\Http\Requests\MessageRefuse  $request
     * @return \Illuminate\Http\Response
     */
    public function refuse($request)
    {
        $ad = $this->adRepository->getById($request->id);
        $ad->notify(new AdRefuse($request->message));
        $this->adRepository->delete($ad);
        $request->session()->flash('status', "L'annonce a bien été refusée et le rédacteur va être notifié.");

        return response()->json(['id' => $ad->id]);
    }

    /**
     * Display obsolete ads.
     *
     * @return \Illuminate\Http\Response
     */
    public function obsoletes()
    {
        $ads = $this->adRepository->obsolete(5);

        return view('admin.obsoletes', compact('ads'));
    }

    /**
     * Add a week.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function addWeek(Request $request, Ad $ad)
    {
        $this->authorize('manage', $ad);
        $limit = $this->adRepository->addWeek($ad);

        return response()->json([
            'limit' => $limit->format('d-m-Y'),
            'ok' => $limit->greaterThan(Carbon::now()),
        ]);
    }

    /**
     * Destroy an ad.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Ad $ad)
    {
        $this->authorize('manage', $ad);
        $this->adRepository->delete($ad);
        $request->session()->flash('status', "L'annonce a bien été supprimée.");

        return response()->json();
    }

    /**
     * Display messages to approve.
     *
     * @return \Illuminate\Http\Response
     */
    public function messages()
    {
        $messages = $this->messagerepository->all(5);

        return view('admin.messages', compact('messages'));
    }

    /**
     * Approve a message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function messageApprove(Request $request, Message $message)
    {
        $ad = $this->messagerepository->getAd($message);
        $message->notify(new MessageApprove($ad, $message));
        $ad->notify(new AdMessage($ad, $request->message, $message->email));
        $this->messagerepository->delete($message);
        $request->session()->flash('status', "Le message a bien été approuvé et le rédacteur va être notifié.");

        return response()->json(['id' => $message->id]);
    }

    /**
     * Deny a message.
     *
     * @param  App\Http\Requests\MessageRefuse  $request
     * @return \Illuminate\Http\Response
     */
    public function MessageRefuse(MessageRefuseRequest $request)
    {
        $message = $this->messagerepository->getById($request->id);
        $ad = $this->messagerepository->getAd($message);
        $message->notify(new MessageRefuse($ad, $message, $request->message));
        $this->messagerepository->delete($message);
        $request->session()->flash('status', "Le message a bien été refusé et le rédacteur va être notifié.");

        return response()->json(['id' => $ad->id]);
    }
}
