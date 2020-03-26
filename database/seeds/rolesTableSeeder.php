<?php

use Illuminate\Database\Seeder;

class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_roles')->inser([
            'roleName' => Str::random(10),
            'status' => 0,
            'instituteId' => 1,
            'createdBy' => 1,
        ]);
    }
}
