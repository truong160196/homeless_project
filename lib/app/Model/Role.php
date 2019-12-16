<?php

namespace App\Model;

use Spatie\Permission\Guard;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Contracts\Role as RoleContract;
use Spatie\Permission\Traits\RefreshesPermissionCache;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use \LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class Role extends Model
{
    use AutoloadsRelationships;
    use HasPermissions;
    use RefreshesPermissionCache;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'name',
        'guard_name',
        'pivot'
    ];

    /**
     * A role may be given various permissions.
     */
    public  function getUsers() {
        return $this->belongsTo(MUser::class);
    }
}
