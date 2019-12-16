<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DonateActivity extends Model
{
    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'activity_name',
        'activity_detail',
        'is_delete',
    ];
}
