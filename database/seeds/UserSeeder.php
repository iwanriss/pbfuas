<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new User();
        $customer->name = "customer";
        $customer->email = "iiwanris@gmail.com";
        $customer->password = bcrypt("iiwanris");
        $customer->nomer_hp = "081233456123";
        $customer->tanggal_lahir = "7 Januari 2000";
        $customer->save();
        $customer->assignRole('customer');

        $admin = new User();
        $admin ->name = "admin";
        $admin ->email = "adminku@gmail.com";
        $admin ->password = bcrypt("adminku");
        $admin ->nomer_hp = "08723414512521";
        $admin ->tanggal_lahir = "1 Juni 2000";
        $admin->save();
        $admin->assignRole('admin');

        $mitra = new User();
        $mitra ->name = "mitra";
        $mitra ->email = "adiputrowkk@gmail.com";
        $mitra ->password = bcrypt("rahasia1234");
        $mitra ->nomer_hp = "0856789213712";
        $mitra ->tanggal_lahir = "31 Januari 2000";
        $mitra ->save();
        $mitra ->assignRole('mitra');

    }
}
