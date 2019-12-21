<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class JoinTransactionsUser extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'join_users_transactions';
    protected $dateFormat = "Y-m-d";
    public static $snakeAttributes = false;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'user_id',
        'transaction_id',
    ];

    public function getUsers() {
        return $this->belongsTo(MUser::class);
    }

    public function getTransactions() {
        return $this->belongsTo(Transactions::class);
    }
}

