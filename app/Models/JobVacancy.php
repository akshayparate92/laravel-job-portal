<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class JobVacancy extends Model
{
    use HasFactory , SoftDeletes;
    public static array $experience = ['Fresher', 'Intermidiate', 'Senior'];
    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'];
    protected $fillable = [
        'title',
        'location',
        'salary',
        'description',
        'experience',
        'category'
    ];
    public function employer():BelongsTo{

        return $this->belongsTo(Employer::class);
    }
    public function jobApplications():HasMany{
        return $this->hasMany(JobApplication::class);
    }

    public function hasUserApplied(Authenticatable|User|int $user ):bool{
        return $this->where('id' , $this->id)
        ->whereHas('jobApplications' , 
        fn($query) => $query->where('user_id' ,'=', $user->id)
    )->exists();
    }
}
