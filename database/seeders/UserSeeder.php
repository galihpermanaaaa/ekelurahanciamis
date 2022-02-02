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
        $user->prov_id = "12";
        $user->city_id  = "168";
        $user->dis_id = "2160";
        $user->subdis_id ="25821";
        $user->id_rw ="1";
        $user->save();
    }
}
