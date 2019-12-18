<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LiamWiltshire\LaravelJitLoader\Concerns\AutoloadsRelationships;

class Store extends Model
{
    use SoftDeletes;
    use AutoloadsRelationships;
    protected $table = 'stores';
    public static $snakeAttributes = false;

    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot'
    ];

    protected $fillable = [
        'name',
        'address',
        'district',
        'city',
        'phone',
        'logoUrl',
        'red_invoice_id',
    ];

    public function redInvoices() {
        return $this->belongsTo(RedInvoice::class, 'red_invoice_id');
    }
}
