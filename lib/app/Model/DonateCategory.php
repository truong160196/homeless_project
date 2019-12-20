<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class DonateCategory extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;

    protected $table = 'donate_categories';
    protected $dateFormat = "Y-m-d";
    public static $snakeAttributes = false;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'category_name',
        'category_detail',
        'is_delete',
    ];

    public  function donates() {
        return $this->belongsTo(Donate::class);
    }
}
