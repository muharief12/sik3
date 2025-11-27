<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\DeterminingControl;
use Illuminate\Auth\Access\HandlesAuthorization;

class DeterminingControlPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:DeterminingControl');
    }

    public function view(AuthUser $authUser, DeterminingControl $determiningControl): bool
    {
        return $authUser->can('View:DeterminingControl');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:DeterminingControl');
    }

    public function update(AuthUser $authUser, DeterminingControl $determiningControl): bool
    {
        return $authUser->can('Update:DeterminingControl');
    }

    public function delete(AuthUser $authUser, DeterminingControl $determiningControl): bool
    {
        return $authUser->can('Delete:DeterminingControl');
    }

    public function restore(AuthUser $authUser, DeterminingControl $determiningControl): bool
    {
        return $authUser->can('Restore:DeterminingControl');
    }

    public function forceDelete(AuthUser $authUser, DeterminingControl $determiningControl): bool
    {
        return $authUser->can('ForceDelete:DeterminingControl');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:DeterminingControl');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:DeterminingControl');
    }

    public function replicate(AuthUser $authUser, DeterminingControl $determiningControl): bool
    {
        return $authUser->can('Replicate:DeterminingControl');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:DeterminingControl');
    }

}