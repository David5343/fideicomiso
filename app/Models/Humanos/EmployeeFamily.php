<?php

namespace App\Models\Humanos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmployeeFamily extends Model
{
    use HasFactory;
    //protected $table = 'employee_families';
    public function employe(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
