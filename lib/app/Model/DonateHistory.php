<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class DonateHistory extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'donate_histories';
    protected $dateFormat = 'Y-m-d H:i:s.v';
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
        'donate_id',
        'user_id',
    ];

    public  function donates() {
        return $this->belongsTo(Donate::class);
    }

    public  function users() {
        return $this->belongsTo(MUser::class);
    }
}
