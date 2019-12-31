<?php



namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class Wallet extends Authenticatable
{
	use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'wallets';
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'status' => 'int',
		'is_delete' => 'int'
	];

	protected $fillable = [
        'address',
        'type',
        'token',
        'chain_code',
        'contract_address',
        'pk',
        'public_key',
        'user_id',
	];

    public function users()
    {
        return $this->belongsTo(MUser::class, 'user_id');
    }
}
