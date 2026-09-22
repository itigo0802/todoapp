<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $todos = Auth::user()->todos()->get();

        return Inertia::render('Todo/Index', [
            'todos' => $todos,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TodoRequest $request): RedirectResponse
    {
        Auth::user()->todos()->create($request->validated());

        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, Todo $todo): RedirectResponse
    {
        $todo->update($request->validated());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo): RedirectResponse
    {
        abort_unless($todo->user_id === Auth::id(), 403);

        $todo->delete();

        return back();
    }
}
