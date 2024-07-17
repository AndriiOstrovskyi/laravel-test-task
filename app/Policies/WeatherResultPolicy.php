<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WeatherResult;
use Illuminate\Auth\Access\Response;

class WeatherResultPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, WeatherResult $weatherResult): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, WeatherResult $weatherResult): bool
    {
        return $user->isAdmin();
    }
}
