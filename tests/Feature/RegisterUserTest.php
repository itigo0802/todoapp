<?php

use App\Models\User;

it('lowercase the email before storing the user', function () {
    $this->post(route('register.store'), [
        'email' => 'TEST@EXAMPLE.COM',
        'password' => 'password',
        'password_confirmation' => 'password',
        'name' => 'Test',
    ]);

    $this->assertDatabaseHas('users', [
        'email' => 'test@example.com',
    ]);
});

it('rejects a duplicate email that only differs by case', function () {
    User::factory()->create(['email' => 'test@example.com']);

    $this->post(route('register.store'), [
        'email' => 'Test@Example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'name' => 'Test',
    ])->assertSessionHasErrors('email');
});
