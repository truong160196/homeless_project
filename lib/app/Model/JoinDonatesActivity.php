<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JoinDonatesActivity extends Model
{
    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'donate_id',
        'activity_id',
    ];

    public  function donates() {
        return $this->belongsTo(Donate::class);
    }

    public  function activities() {
        return $this->belongsTo(DonateActivity::class);
    }
}
