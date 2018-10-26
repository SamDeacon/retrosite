<?php

use Carbon\Carbon;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@app.com',
                'password' => Hash::make('password'),
                'usertype' => 'superadmin',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ],
            [
                'name' => 'Basic User',
                'email' => 'basicuser@app.com',
                'password' => Hash::make('password'),
                'usertype' => 'user',
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ]
        ];
        DB::table('users')->insert($users);
    }
}