<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    use HasUlids;
    protected $fillable = [
        'title',
        'user_id',
        'desc',
        'price',
        'image',
        'stock',
        'discount',
        'total'
    ];
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
