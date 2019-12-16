<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class DonateActivity extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'donate_activities';
    protected $dateFormat = 'Y-m-d H:i:s.v';
    public static $snakeAttributes = false;

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
