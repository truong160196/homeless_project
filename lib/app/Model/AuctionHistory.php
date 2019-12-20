<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class AuctionHistory extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'auction_histories';
    protected $dateFormat = "Y-m-d";
    public static $snakeAttributes = false;

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
        'auction_id',
        'user_id',
    ];

    public  function auctions() {
        return $this->belongsTo(Auction::class);
    }

    public  function users() {
        return $this->belongsTo(MUser::class);
    }
}
