<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DonateCategory extends Model
{
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
