<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = ['expected_salary','user_id', 'jobvacancy_id', 'cv_path'];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
    
    public function jobVacancy() : BelongsTo{
        return $this->belongsTo(JobVacancy::class);
    }
}
