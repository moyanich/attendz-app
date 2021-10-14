<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Roles;

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
            'password' => 'password',
        ]);

       // dd($response); 

        $this->assertAuthenticated();

        $response->assertRedirect('/dashboard');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_cannot_access_admin_page()
    {
        $user = USER::factory()->create();

        $response = $this->post('/login' , [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->get('/admin/users');

        $this->assertAuthenticated();

        $response->assertRedirect('/dashboard');
    }


    /**
     * A basic feature test example.
     * //TODO : TEST FAILED
     *
     * @return void
     */
  public function test_user_can_access_admin_page()
    {
        $user = USER::factory()->create();

        $user->roles()->attach(1);

        $this->post('/login' , [
            'name' => $user->name,
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response = $this->get('/admin/users');

        $response->assertSeeText('User');

       // $response->assertRedirect('/dashboard');
    } 

    
}
