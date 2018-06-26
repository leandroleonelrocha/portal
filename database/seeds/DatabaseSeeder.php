<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Model::unguard();

        $this->call(CategoriasDocumentosTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(NavbarTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);

        Model::reguard();
    }

}
