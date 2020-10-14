<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AppModelsAd extends Model
{
    // use HasFactory;
    use Notifiable;


    protected $table = 'ads';

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'texte',
        'category_id',
        'region_id',        
        'user_id',
        'departement',
        'commune',
        'commune_name',
        'commune_postal',
        'pseudo',
        'email',
        'limit',
        'active',
    ];
    /**
     * Get the region that owns the ad.
     */
    public function region()
    {
        return $this->belongsTo(AppModelsRegion::class);
    }
    /**
     * Get the category that owns the ad.
     */
    public function category()
    {
        return $this->belongsTo(AppModelsCategory::class);
    }
    /**
     * Get the photos for the ad.
     */
    public function photos()
    {
        return $this->hasMany(AppModelsUpload::class);
    }
}
