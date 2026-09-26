<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PasskeyController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        return Inertia::render('auth/Passkey', [
            'passkeys' => $user->passkeys,
        ]);
    }
}
