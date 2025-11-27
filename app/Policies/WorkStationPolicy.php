<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\WorkStation;
use Illuminate\Auth\Access\HandlesAuthorization;

class WorkStationPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:WorkStation');
    }

    public function view(AuthUser $authUser, WorkStation $workStation): bool
    {
        return $authUser->can('View:WorkStation');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:WorkStation');
    }

    public function update(AuthUser $authUser, WorkStation $workStation): bool
    {
        return $authUser->can('Update:WorkStation');
    }

    public function delete(AuthUser $authUser, WorkStation $workStation): bool
    {
        return $authUser->can('Delete:WorkStation');
    }

    public function restore(AuthUser $authUser, WorkStation $workStation): bool
    {
        return $authUser->can('Restore:WorkStation');
    }

    public function forceDelete(AuthUser $authUser, WorkStation $workStation): bool
    {
        return $authUser->can('ForceDelete:WorkStation');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:WorkStation');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:WorkStation');
    }

    public function replicate(AuthUser $authUser, WorkStation $workStation): bool
    {
        return $authUser->can('Replicate:WorkStation');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:WorkStation');
    }

}