<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobVacancy extends Model
{
    use HasFactory;
    public static array $experience = ['Fresher', 'Intermidiate', 'Senior'];
    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'];

    public function employer():BelongsTo{

        return $this->belongsTo(Employer::class);
    }
}
