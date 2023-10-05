<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\DatabaseTransactions;

describe('dashboard home-page', function () {
    it('redirects / to /dashboard', function () {
        $this->get('/')->assertRedirect('/dashboard');
    });

    it('if user not auth redirects to login', function () {
        $this->get('/dashboard')->assertRedirect('/login');
    });

    it('if user not verified redirects to verifying', function () {
        $user = \App\Models\Dashboard\Users\User::factory()->create([
            'email' => 'test@example.com',
            'email_verified_at' => null
        ]);

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertRedirect('/email/verify');
    });

    it('if user verified redirects to dashboard', function () {
        $user = \App\Models\Dashboard\Users\User::whereNotNull('email_verified_at')->first();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertOk();
    });
});
