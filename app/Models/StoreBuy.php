<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreBuy extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'product_id',
        'user_id',
    ];
    /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo\
     */
    public function product()
    {
        return $this->belongsTo(StoreProduct::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
