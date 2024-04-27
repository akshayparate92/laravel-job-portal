<?php

namespace App\Policies;

use App\Models\JobVacancy;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobVacancyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }
    public function viewAnyEmployer(User $user): bool
    {
        return true;
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, JobVacancy $jobVacancy): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
       return $user->employer !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobVacancy $jobVacancy): bool | Response
    {
        if($jobVacancy->employer->user_id !== $user->id){
            return false;
        }

        if($jobVacancy->jobApplications()->count() >0){
            return Response::deny("You cannot delete job vacancy with applications.");
        }
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobVacancy $jobVacancy): bool
    {
        return $jobVacancy->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobVacancy $jobVacancy): bool
    {
        return $jobVacancy->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobVacancy $jobVacancy): bool
    {
        return $jobVacancy->employer->user_id === $user->id;
    }

    public function apply ( User $user , JobVacancy $jobVacancy):bool{

        return !$jobVacancy->hasUserApplied($user);
    }
}
