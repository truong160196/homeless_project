<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class JoinProductStore extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'join_products_stores';
    protected $dateFormat = "Y-m-d";
    public static $snakeAttributes = false;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'store_id',
        'product_id',
    ];

    public  function products() {
        return $this->belongsTo(Product::class);
    }

    public  function stores() {
        return $this->belongsTo(MUser::class);
    }
}
