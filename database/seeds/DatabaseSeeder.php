<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminUsersTableSeeder::class);
        $this->call(MarksTableSeeder::class);
        $this->call(CarsTableSeeder::class);


    }
}
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
            ]);
        }

    }
}
class AdminUsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin_users')->insert([
            'name' => "Admin",
            'email' => 'hello@gmail.com',
            'password' => Hash::make('12345'),
        ]);

    }
}
class MarksTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('marks')->insert([
                'name' => Str::random(5)
            ]);
        }

    }
}
class CarsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('cars')->insert([
                'name' => Str::random(5),
                'mark_id' => random_int(0,10),
                'user_id' => random_int(0,10),
                'year' => random_int(1960,2022),
                'probig' => random_int(0,100000000),
                'image' => null,
                'description' =>Str::random(200)
            ]);
        }

    }
}
