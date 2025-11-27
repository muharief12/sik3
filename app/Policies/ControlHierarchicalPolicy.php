<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ControlHierarchical;
use Illuminate\Auth\Access\HandlesAuthorization;

class ControlHierarchicalPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ControlHierarchical');
    }

    public function view(AuthUser $authUser, ControlHierarchical $controlHierarchical): bool
    {
        return $authUser->can('View:ControlHierarchical');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ControlHierarchical');
    }

    public function update(AuthUser $authUser, ControlHierarchical $controlHierarchical): bool
    {
        return $authUser->can('Update:ControlHierarchical');
    }

    public function delete(AuthUser $authUser, ControlHierarchical $controlHierarchical): bool
    {
        return $authUser->can('Delete:ControlHierarchical');
    }

    public function restore(AuthUser $authUser, ControlHierarchical $controlHierarchical): bool
    {
        return $authUser->can('Restore:ControlHierarchical');
    }

    public function forceDelete(AuthUser $authUser, ControlHierarchical $controlHierarchical): bool
    {
        return $authUser->can('ForceDelete:ControlHierarchical');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ControlHierarchical');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ControlHierarchical');
    }

    public function replicate(AuthUser $authUser, ControlHierarchical $controlHierarchical): bool
    {
        return $authUser->can('Replicate:ControlHierarchical');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ControlHierarchical');
    }

}