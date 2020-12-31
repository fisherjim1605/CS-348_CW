<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use DateTime;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'James';
        $user->email = 'fakeemail@thisadress.com';
        $user->password = "1234";
        $user->email_verified_at = new DateTime();
        $user->save();

        $users = User::factory()->count(10)->create();
    }
}
