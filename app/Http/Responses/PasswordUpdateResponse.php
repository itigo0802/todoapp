<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\PasswordUpdateResponse as ContractsPasswordUpdateResponse;

class PasswordUpdateResponse implements ContractsPasswordUpdateResponse
{
    public function toResponse($request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'パスワードを変更しました。');
    }
}
