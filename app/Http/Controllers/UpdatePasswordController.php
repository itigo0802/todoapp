<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class UpdatePasswordController extends Controller
{
    public function edit(): Response
    {
        return Inertia::render('auth/UpdatePassword');
    }
}
