<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "verifikator";
        $user->email = "verifikator@mail.com";
        $user->password = bcrypt('123456789'); 
        $user->role_name = "Verifikator";
        $user->save();
    }
}
