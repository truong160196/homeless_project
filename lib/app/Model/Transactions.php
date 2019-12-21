<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class Transactions extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'transactions';
    protected $dateFormat = "Y-m-d";
    public static $snakeAttributes = false;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'hash',
        'block',
        'type',
        'amount',
        'price',
        'fee',
        'tax',
        'detail',
        'note',
        'status',
    ];
}
