<?php

namespace App\Models\Prestaciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subdependency extends Model
{
    use HasFactory;
    protected $table = 'subdependencies';
    public function dependency():BelongsTo
    {
        return $this->belongsTo(Dependency::class);
    }
}
