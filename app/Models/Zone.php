<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ZoneScope;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;

class Zone extends Model
{
    use HasFactory;
    use SpatialTrait;

    protected $spatialFields = [
        'coordinates'
    ];

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    // public function deliverymen()
    // {
    //     return $this->hasMany(DeliveryMan::class);
    // }

    // public function orders()
    // {
    //     return $this->hasManyThrough(Order::class, Store::class);
    // }


    // public function campaigns()
    // {
    //     return $this->hasManyThrough(Campaigns::class, Store::class);
    // }

    public function scopeActive($query)
    {
        return $query->where('status', '=', 1);
    }

    // protected static function booted()
    // {
    //     static::addGlobalScope(new ZoneScope);
    // }
}
