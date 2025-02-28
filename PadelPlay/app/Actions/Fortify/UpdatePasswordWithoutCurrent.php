<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdatePasswordWithoutCurrent implements UpdatesUserPasswords
{
    public function update($user, array $input)
    {
        Validator::make($input, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validateWithBag('updatePassword');

        $user->forceFill([
            'password' => Hash::make($input['password']),
        ])->save();
    }
}