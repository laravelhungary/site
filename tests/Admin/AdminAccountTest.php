<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Admin;

class AdminAccountTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
    	$count = Admin::whereEmail('admin@admin.hu')->count();
    	if ($count > 0) {
    		return $this->assertTrue(true);
    	}
    	
        $admin = Admin::create([
        	'name' => 'Admin',
        	'email' => 'admin@admin.hu',
        	'password' => bcrypt('123456'),
    	]);
    	return $admin;
    }
}
