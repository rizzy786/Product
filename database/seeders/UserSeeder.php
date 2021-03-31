<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder{
    
    /**
     * Run the database seeds.
     * create two users and add to users table 
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Bob', 'email' => 'bob@example.com', 'password' => 1234, 'is_admin' =>true],
            ['name' => 'Alice', 'email' => 'alice@example.com', 'password' => 1234, 'is_admin' =>false],
           ];
        
        foreach($users as $user ){
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
                'is_admin' => $user['is_admin'],
                ]);
        }
    }
}

