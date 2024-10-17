<?php

namespace App\Models\Humanos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function place(): HasMany
    {
        return $this->hasMany(Place::class);
    }
}
