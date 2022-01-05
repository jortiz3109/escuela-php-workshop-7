<?php

namespace App\Actions\Fortify;

use App\Exceptions\UserDisabledException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticateUser
{
    /**
     * @throws \Throwable
     */
    public function authenticates(Request $request): ?User
    {
        $user = User::where('email', $request->input('email'))->first();

        if (null === $user || false === Hash::check($request->input('password'), $user->password())) {
            return null;
        }

        throw_if($user->isDisabled(), UserDisabledException::class, $request);

        return $user;
    }
}
