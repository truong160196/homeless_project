<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class JoinAuctionsLocation extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'join_auctions_locations';
    protected $dateFormat = "Y-m-d";
    public static $snakeAttributes = false;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'auction_id',
        'location_id',
    ];

    public  function auctions() {
        return $this->belongsTo(Auction::class);
    }

    public  function locations() {
        return $this->belongsTo(Locations::class);
    }
}
