<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class Auction extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;
    protected $table = 'auctions';
    protected $dateFormat = "Y-m-d";
    public static $snakeAttributes = false;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'auction_title',
        'auction_detail',
        'auction_start_time',
        'auction_end_time',
        'auction_raised',
        'product_title',
        'product_image',
        'product_detail',
        'production_author',
        'auction_address',
        'auction_private_key',
        'auction_public_key',
        'donate_status',
        'is_delete',
    ];
}
