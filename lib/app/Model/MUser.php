<?php

/**
 * Created by Aris Model.
 */

namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class MUser extends Authenticatable
{
	use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'users';
	public static $snakeAttributes = false;

	protected $casts = [
		'id' => 'int',
		'status' => 'int',
		'is_delete' => 'int'
	];

	protected $hidden = [
		'pw',
		'remember_token',
		'deleted_at'
	];

	protected $dates = [
		'last_update_password',
		'otp_expired'
	];

	protected $fillable = [
        'access_key',
        'username',
        'phone',
        'full_name',
        'birthday',
        'email',
        'user_type',
        'address',
        'pw',
        'score',
        'email_verify',
        'email_verified_at',
		'code',
		'status',
        'role_id',
		'remember_token',
		'otp',
        'otp_expired',
        'otp_verify',
        'google_auth_verify',
		'is_delete',
        'last_update_password',
		'last_local_login'
	];

    public  function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
