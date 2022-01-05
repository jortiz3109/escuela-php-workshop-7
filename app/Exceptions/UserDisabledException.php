<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserDisabledException extends Exception
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function render(): RedirectResponse
    {
        return redirect()->route('login')->onlyInput('email')->with('disabled', true);
    }

    public function context(): array
    {
        return ['email' => $this->request->input('email'), 'ip' => $this->request->ip()];
    }
}
