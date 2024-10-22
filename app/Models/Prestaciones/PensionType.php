<?php

namespace App\Models\Prestaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PensionType extends Model
{
    use HasFactory;

    public function retirees(): HasMany
    {
        return $this->hasMany(Retiree::class);
    }
}
