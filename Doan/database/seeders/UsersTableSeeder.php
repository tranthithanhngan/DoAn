<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\roles;
use App\Models\Admin;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        $adminRoles=roles::where('name_roles','admin')->first();
        // $authorRoles=roles::where('name_roles','author')->first();
        $userRoles=roles::where('name_roles','user')->first();

        $admin=Admin::create([
            'admin_name'=>'Ngân',
            'admin_email'=>'thanhngan@gmail.com',
            'admin_phone'=>'0987654321',
            'admin_password'=>'123456'
        ]);
        $user=Admin::create([
            'admin_name'=>'Huệ',
            'admin_email'=>'nganhue@gmail.com',
            'admin_phone'=>'0987654321',
            'admin_password'=>'123456'
        ]);
        // $author=Admin::create([
        //     'admin_name'=>'Thanh Ngân',
        //     'admin_email'=>'thanhngan2000@gmail.com',
        //     'admin_phone'=>'0987654321',
        //     'admin_password'=>'123456'
        // ]);
        $admin->roles()->attach($adminRoles);
        // $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);
        //
    }
}
