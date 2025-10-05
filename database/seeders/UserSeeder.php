<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
            'first_name'=>"Admin",
            'last_name'=>"Admin",
            'email'=>"admin590@gmail.com",
            'phone'=>"+9981234245",
            'password'=>Hash::make('password'),

        ]);

        $user->assignRole('admin');

        $user = User::create([
            'first_name'=>"Sardor",
            'last_name'=>"Abdullayev",
            'email'=>"sardor1234@gmail.com",
            'phone'=>"+99814644445",
            'password'=>Hash::make('password'),

        ]);
        $user->assignRole('editor');

        $user = User::create([
            'first_name'=>"Sanjar",
            'last_name'=>"Sherzodov",
            'email'=>"sanjik14@gmail.com",
            'phone'=>"+99814623445",
            'password'=>Hash::make('password'),

        ]);
        $user->assignRole('shop-manager');

        $user = User::create([
            'first_name'=>"Jamila",
            'last_name'=>"Asqarova",
            'email'=>"jamila56@gmail.com",
            'phone'=>"+99814690445",
            'password'=>Hash::make('password'),

        ]);
        $user->assignRole('helpdesk-support');

        $user = User::create([
            'first_name'=>"Fazliddin",
            'last_name'=>"Qobilov",
            'email'=>"fazliddin790@gmail.com",
            'phone'=>"+99811244445",
            'password'=>Hash::make('password'),

        ]);
        $user->assignRole('customer');
        // $admin->roles()->attach(2);


       $users = User::factory()->count(10)->create();
       foreach ($users as $user) {
        $user->assignRole('customer');
       }
    }
}
