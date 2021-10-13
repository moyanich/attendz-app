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
            'password' => 'password',
        ]);

       // dd($response); 


        $this->assertAuthenticated();

        $response->assertRedirect('/');
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

       // dd($response); 

        $this->get('/admin/user');

        $this->assertAuthenticated();

        $response->assertRedirect('/');
    }
}
