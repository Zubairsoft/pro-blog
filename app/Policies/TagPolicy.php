<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Tag;
use Domains\Supports\Enums\RoleEnum;

class TagPolicy
{

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $admin, Tag $tag): bool
    {
        return $admin->id === $tag->admin_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function destroy(Admin $admin, Tag $tag): bool
    {
        return $admin->id === $tag->admin_id;
    }
}
