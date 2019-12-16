<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class JoinDonatesActivity extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'join_donates_activities';
    protected $dateFormat = "Y-m-d";
    public static $snakeAttributes = false;

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
