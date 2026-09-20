<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class RegisterUserController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('auth/Register');
    }

    public function store(RegisterUserRequest $request): RedirectResponse
    {
        $user = app(CreatesNewUsers::class)->create($request->all());
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home'));
    }
}
