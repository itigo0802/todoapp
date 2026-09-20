<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserInfoRequest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UpdateUserInfoController extends Controller
{
    public function edit()
    {
        return Inertia::render('Auth/UpdateUserInfo');
    }

    public function update(UpdateUserInfoRequest $request)
    {
        $user = Auth::user();
        $user->update($request->validated());

        return redirect(route('home'))->with('success', 'アカウント情報を更新しました。');
    }
}
