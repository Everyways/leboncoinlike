<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifications\AdMessage;
use App\Repositories\{AdRepository, MessageRepository};
use App\Http\Requests\{MessageAd, EmailUpdate};

class UserController extends Controller
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
     * @param AdRepository
     * @param Messagerepository
     * @return void
     */
    public function __construct(AdRepository $adRepository, Messagerepository $messagerepository)
    {
        $this->adRepository = $adRepository;
        $this->messagerepository = $messagerepository;
    }

    /**
     * Display the panel.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ads = $this->adRepository->getByUser($request->user());

        $adAttenteCount = $this->adRepository->noActiveCount($ads);
        $adActivesCount = $this->adRepository->activeCount($ads);
        $adPerimesCount = $this->adRepository->obsoleteCount($ads);

        return view('user.index', compact('adActivesCount', 'adPerimesCount', 'adAttenteCount'));
    }

    /**
     * Send message.
     *
     * @param  App\Http\Requests\MessageAd  $request
     * @return \Illuminate\Http\Response
     */
    public function message(MessageAd $request)
    {
        $ad = $this->adRepository->getById($request->id);

        if (auth()->check()) {
            $ad->notify(new AdMessage($ad, $request->message, auth()->user()->email));
            return response()->json(['info' => 'Votre message va être rapidement transmis.']);
        }

        $this->messagerepository->create([
            'texte' => $request->message,
            'email' => $request->email,
            'ad_id' => $ad->id,
        ]);

        return response()->json(['info' => 'Votre message a été mémorisé et sera transmis après modération.']);
    }

    /**
     * Display the actives ads.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function actives(Request $request)
    {
        $ads = $this->adRepository->active($request->user(), 5);

        return view('user.actives', compact('ads'));
    }

    /**
     * Display the waiting ads.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attente(Request $request)
    {
        $ads = $this->adRepository->attente($request->user(), 5);

        return view('user.waiting', compact('ads'));
    }

    /**
     * Display obsolete ads.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function obsoletes(Request $request)
    {
        $ads = $this->adRepository->obsoleteForUser($request->user(), 5);

        return view('user.obsoletes', compact('ads'));
    }

    /**
     * Show the form for editing the email.
     *
     * @return \Illuminate\Http\Response
     */
    public function emailEdit()
    {
        return view('user.email');
    }

    /**
     * Update the email.
     *
     * @param  App\Http\Requests\EmailUpdate  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function emailUpdate(EmailUpdate $request)
    {
        auth()->user()->email = $request->email;
        auth()->user()->save();
        $request->session()->flash('status', "Votre email a bien été mis à jour.");

        return back();
    }

    /**
     * Show user data.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        $user = auth()->user();

        return view('user.data', compact('user'));
    }
}
