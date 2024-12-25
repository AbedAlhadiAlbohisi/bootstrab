<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /** @use HasFactory<\Database\Factories\CityFactory> */
    use HasFactory;

    // protected $casts = [
    //     'created_at' => 'datetime',
    //     'updated_at' => 'datetime',
    // ];
    protected $hidden =
    [
        'created_at',
        'updated_at',
    ];
    public function getactivestatusAttribute()
    {
        return $this->active == 1 ? 'Active' : 'InActive';
    }

}
