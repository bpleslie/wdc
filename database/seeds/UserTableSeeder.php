<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Seed the users table
     */
    public function run()
    {
        
        factory(User::class, 20)->create();

        $user = new App\User;
        $user->name = 'Brad Leslie';
        $user->email = 'bradleypleslie@gmail.com';
        $user->password = bcrypt('password');
        $user->save();

    }
}
