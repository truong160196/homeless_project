<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'location_name',
    ];
}
