<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;
    use HasUlids;
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone',
        'role'
    ];
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }
}
