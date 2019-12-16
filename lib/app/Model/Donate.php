<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'donate_title',
        'donate_detail',
        'donate_start_time',
        'donate_end_time',
        'donate_goal',
        'donate_raised',
        'donate_address',
        'donate_private_key',
        'donate_public_key',
        'donate_status',
        'is_delete',
        'category_id',
    ];

    public  function category() {
        return $this->belongsTo(DonateCategory::class, 'category_id');
    }
}
