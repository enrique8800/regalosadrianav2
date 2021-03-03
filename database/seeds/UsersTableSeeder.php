<?php

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
        App\User::create([
            'name'      => 'Administrador',
            'email'     => 'admin@admin.com',
            'password'     => bcrypt('123'),

        ]);

        App\User::create([
            'name'      => 'Enrique',
            'email'     => 'enrique8800@gmail.com',
            'password'     => bcrypt('Molina.8800'),

        ]);

        factory(App\User::class, 7)->create();
    }
}
