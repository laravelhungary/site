<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserAccountTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $count = User::whereEmail('teszt@felhasznalo.hu')->count();
        if ($count > 0) {
            return $this->assertTrue(true);
        }
        
        $user = User::create([
        	'name' => 'TesztFelhasznalo',
        	'email' => 'teszt@felhasznalo.hu',
        	'password' => bcrypt('123456'),
        	'avatar' => 'avatar/23424342.jpg',
        ]);
        return $user;
    }

    public function testLogin() {
        $login = Auth::attempt(['email' => 'teszt@felhasznalo.hu', 'password' => '123456']);
        return $this->assertTrue($login);
    }
}
