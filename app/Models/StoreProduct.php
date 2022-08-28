<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProduct extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'price',
        'description',
    ];
    /**
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo\
     */
    public function category()
    {
        return $this->belongsTo(StoreCategory::class);
    }
}
