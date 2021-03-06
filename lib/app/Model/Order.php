<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class Order extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;
    protected $table = 'orders';
    protected $dateFormat = "Y-m-d H:i:s";
    public static $snakeAttributes = false;

    protected $guarded = ['id'];

    protected $hidden = [
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'order_total',
        'order_tax',
        'order_address',
        'hash',
        'status',
        'created_at',
    ];
}
