<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class DonateHistory extends Model
{
    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'value',
        'hash',
        'status',
        'is_delete',
        'donate_id',
        'user_id',
    ];

    public  function donates() {
        return $this->belongsTo(Donate::class);
    }

    public  function users() {
        return $this->belongsTo(User::class);
    }
}
