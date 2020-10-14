<?php

namespace App\Repositories;

use App\Models\AppModelsAd as Ad;
use Carbon\Carbon;

class AdRepository
{
    /**
     * Search.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function search($request)
    {
        $ads = Ad::query();

        if ($request->region != 0) {
            $ads = Ad::whereHas('region', function ($query) use ($request) {
                $query->where('regions.id', $request->region);
            })->when($request->departement != 0, function ($query) use ($request) {
                return $query->where('departement', $request->departement);
            })->when($request->commune != 0, function ($query) use ($request) {
                return $query->where('commune', $request->commune);
            });
        }

        if ($request->category != 0) {
            $ads->whereHas('category', function ($query) use ($request) {
                $query->where('categories.id', $request->category);
            });
        }

        return $ads->with('category')->whereActive(true)->latest()->paginate(3);
    }

    /**
     * Get photos.
     *
     * @param \App\Models\Ad $ad
     */
    public function getPhotos($ad)
    {
        return $ad->photos()->get();
    }

    /**
     * Get an ad by id.
     *
     * @param integer $id
     */
    public function getById($id)
    {
        return Ad::findOrFail($id);
    }

    /**
     * Create an ad.
     *
     * @param Array $data
     */
    public function create($data)
    {
        return Ad::create($data);
    }

    /**
     * Get the no active ads count.
     */
    public function noActiveCount($ads = null)
    {
        if ($ads) {
            return $ads->where('active', false)->count();
        }
        return Ad::where('active', false)->count();
    }

    /**
     * Get the no active ads.
     *
     * @param integer $nbr
     */
    public function noActive($nbr)
    {
        return Ad::whereActive(false)->latest()->paginate($nbr);
    }

    /**
     * Get the  obsolete ads count.
     *
     * @param
     */
    public function obsoleteCount($ads = null)
    {
        if ($ads) {
            return $ads->where('active', true)->where('limit', '<', Carbon::now())->count();
        }
        return Ad::where('limit', '<', Carbon::now())->count();
    }

    /**
     * Approve an ad.
     *
     * @param \App\Models\Ad $ad
     */
    public function approve($ad)
    {
        $ad->active = true;
        $ad->save();
    }

    /**
     * Delete an ad.
     *
     * @param \App\Models\Ad $ad
     */
    public function delete($ad)
    {
        $ad->delete();
    }

    /**
     * Get the obsolete ads.
     *
     * @param integer $nbr
     */
    public function obsolete($nbr)
    {
        return Ad::where('limit', '<', Carbon::now())->latest('limit')->paginate($nbr);
    }

    /**
     * Add a week.
     *
     * @param \App\Models\Ad $ad
     */
    public function addWeek($ad)
    {
        $limit = Carbon::create($ad->limit);
        $limit->addWeek();
        $ad->limit = $limit;
        $ad->save();

        return $limit;
    }

    /**
     * Get the  active ads count.
     *
     * @param
     */
    public function activeCount($ads)
    {
        return $ads->where('active', true)->where('limit', '>=', Carbon::now())->count();
    }

    /**
     * Get an ad by user.
     *
     * @param \App\Models\User $user
     */
    public function getByUser($user)
    {
        return $user->ads()->get();
    }

    /**
     * Get the active ads for user.
     *
     * @param \App\Models\User $user
     * @param integer $nbr
     */
    public function active($user, $nbr)
    {
        return $user->ads()->whereActive(true)->where('limit', '>=', Carbon::now())->paginate($nbr);
    }

    /**
     * Update an ad.
     *
     * @param \App\Models\Ad $ad
     */
    public function update($ad, $data)
    {
        $ad->update($data);
    }

    /**
     * Get the waiting ads for user.
     *
     * @param \App\Models\User $user
     * @param integer $nbr
     */
    public function attente($user, $nbr)
    {
        return $user->ads()->whereActive(false)->paginate($nbr);
    }

    /**
     * Get the obsolete ads for user.
     *
     * @param \App\Models\User $user
     * @param integer $nbr
     */
    public function obsoleteForUser($user, $nbr)
    {
        return $user->ads()->where('limit', '<', Carbon::now())->latest('limit')->paginate($nbr);
    }
}
