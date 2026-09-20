<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class UpdatePasswordController extends Controller
{
    public function edit()
    {
        return Inertia::render('auth/UpdatePassword');
    }
}
