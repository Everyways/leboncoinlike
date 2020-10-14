<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppModelsRegion extends Model
{
    use HasFactory;

    protected $table = 'regions';

        /**
     * Get the ads for the region.
     */
    public function ads()
    {
        return $this->hasMany(AppModelsAd::class);
    }
}
