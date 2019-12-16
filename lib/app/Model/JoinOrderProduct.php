<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class JoinOrderProduct extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'join_orders_products';
    protected $dateFormat = "Y-m-d";
    public static $snakeAttributes = false;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

    public  function products() {
        return $this->belongsTo(Product::class);
    }

    public  function order() {
        return $this->belongsTo(Order::class);
    }
}
