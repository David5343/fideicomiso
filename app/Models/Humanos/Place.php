<?php

namespace App\Models\Humanos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Place extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
       return $this->belongsTo(Category::class);
    }
    public function employee():HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
