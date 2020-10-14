<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AppModelsMessage extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'texte',
        'email',
        'ad_id',
    ];
    /**
     * Get the ad that owns the message.
     */
    public function ad()
    {
        return $this->belongsTo(AppModelsAd::class);
    }
}
