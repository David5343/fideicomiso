<?php

namespace App\Models\Humanos;

use App\Models\Prestaciones\Beneficiary;
use App\Models\Prestaciones\Insured;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    use HasFactory;

    public function employee():HasMany
    {
        return $this->hasMany(Employee::class);
    }
    public function insured():HasMany
    {
        return $this->hasMany(Insured::class);
    }
    public function beneficiary():HasMany
    {
        return $this->hasMany(Beneficiary::class);
    }
}
