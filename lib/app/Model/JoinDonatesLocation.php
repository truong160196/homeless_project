<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JoinDonatesLocation extends Model
{
    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'donate_id',
        'location_id',
    ];

    public  function donates() {
        return $this->belongsTo(Donate::class);
    }

    public  function locations() {
        return $this->belongsTo(Locations::class);
    }
}
