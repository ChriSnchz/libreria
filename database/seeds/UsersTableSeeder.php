<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Role::create(['name' => 'admin']);
         Role::create(['name' => 'empleado']);
         Role::create(['name' => 'cliente']);

        $user = User::create(
             [
                'name' => 'admin',
                'email' => 'admin@email.com',
                'password' => bcrypt('admin'),
             ]
        );
        $user->assignRole('admin');
    }
}
