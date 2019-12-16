<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\RefreshesPermissionCache;
use \LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class Role extends Model
{
    use AutoloadsRelationships;
    use HasPermissions;
    use RefreshesPermissionCache;
    use AutoloadsRelationships;

    protected $table = 'roles';
    protected $dateFormat = "Y-m-d";
    public static $snakeAttributes = false;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'name',
        'guard_name',
    ];

    /**
     * A role may be given various permissions.
     */
    public  function getUsers() {
        return $this->belongsTo(MUser::class);
    }
}
