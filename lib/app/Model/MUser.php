<?php

/**
 * Created by Aris Model.
 */

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class MUser extends Authenticatable implements JWTSubject
{
    use HasRoles;
    use Notifiable;
	use SoftDeletes;
	
	protected $table = 'users';
	protected $dateFormat = 'Y-m-d H:i:s.v';
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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
