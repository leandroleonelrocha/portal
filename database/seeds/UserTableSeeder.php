<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $datos = [
            [
                'username' => 'lbozzolo',
                'updated_at' => '1970-01-01 00:00:01'
            ],
            [
                'username' => 'framato',
                'updated_at' => '1970-01-01 00:00:01'
            ]
        ];

        User::insert($datos);

        // Doy rol de administrador a todos estos usuarios
        $users = User::all();
        foreach ($users as $user)
            $user->roles()->attach(1);
    }

}
