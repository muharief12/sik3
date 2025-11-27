<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\HazardIdentification;
use Illuminate\Auth\Access\HandlesAuthorization;

class HazardIdentificationPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:HazardIdentification');
    }

    public function view(AuthUser $authUser, HazardIdentification $hazardIdentification): bool
    {
        return $authUser->can('View:HazardIdentification');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:HazardIdentification');
    }

    public function update(AuthUser $authUser, HazardIdentification $hazardIdentification): bool
    {
        return $authUser->can('Update:HazardIdentification');
    }

    public function delete(AuthUser $authUser, HazardIdentification $hazardIdentification): bool
    {
        return $authUser->can('Delete:HazardIdentification');
    }

    public function restore(AuthUser $authUser, HazardIdentification $hazardIdentification): bool
    {
        return $authUser->can('Restore:HazardIdentification');
    }

    public function forceDelete(AuthUser $authUser, HazardIdentification $hazardIdentification): bool
    {
        return $authUser->can('ForceDelete:HazardIdentification');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:HazardIdentification');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:HazardIdentification');
    }

    public function replicate(AuthUser $authUser, HazardIdentification $hazardIdentification): bool
    {
        return $authUser->can('Replicate:HazardIdentification');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:HazardIdentification');
    }

}