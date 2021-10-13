<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login_using_the_login_form()
    {
        $user = USER::factory()->create();

        $response = $this->post('/login' , [
            'name' => $user->name,
            'email' => $user->email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect('/');
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function admin_user_can_login_using_the_login_form()
    {
        $user = USER::factory()->create();

        $response = $this->post('/login' , [
            'name' => $user->name,
            'email' => $user->email,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);


        $this->get('/admin/user');

        $this->assertAuthenticated();

        $response->assertRedirect('/');
    }
}
