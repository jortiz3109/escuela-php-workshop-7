<?php

namespace Tests\Feature;

use App\Exceptions\UserDisabledException;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\Concerns\HasUser;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    use HasUser;

    public function test_it_can_render_a_login_view(): void
    {
        $response = $this->get('/login');

        $response->assertOk();
        $response->assertSee(trans('Email'));
    }

    public function test_it_can_login_user(): void
    {
        $user = $this->enabledUser(['email' => 'john.ortiz@evertecinc.com']);

        $response = $this->post('/login', ['email' => $user->email(), 'password' => 'password']);

        $response->assertSessionHasNoErrors();
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_it_dont_authenticates_with_wrong_password(): void
    {
        $user = $this->user(['email' => 'john.ortiz@evertecinc.com']);

        $response = $this->post('/login', ['email' => $user->email(), 'password' => 'password1']);

        $response->assertSessionHasErrors('email');
        $this->assertNull(Auth::user());
    }

    public function test_a_disabled_user_cant_login(): void
    {
        $this->expectException(UserDisabledException::class);
        $this->withoutExceptionHandling();

        $user = $this->disabledUser(['email' => 'john.ortiz@evertecinc.com']);
        $this->post('/login', ['email' => $user->email(), 'password' => 'password']);

        $this->assertNull(Auth::user());
    }
}
