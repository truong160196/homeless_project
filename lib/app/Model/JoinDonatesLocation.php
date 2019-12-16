<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class JoinDonatesLocation extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'join_donates_locations';
    protected $dateFormat = 'Y-m-d H:i:s.v';
    public static $snakeAttributes = false;

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
