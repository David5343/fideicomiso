<?php

namespace App\Models\Prestaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dependency extends Model
{
    use HasFactory;

    protected $table = 'dependencies';

    public function subdependency(): HasMany
    {
        return $this->hasMany(Subdependency::class);
    }
}
