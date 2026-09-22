<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserInfoRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class UpdateUserInfoController extends Controller
{
    public function edit(): Response
    {
        return Inertia::render('auth/UpdateUserInfo');
    }

    public function update(UpdateUserInfoRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        $user->update($request->validated());

        return redirect(route('home'))->with('success', 'アカウント情報を更新しました。');
    }
}
