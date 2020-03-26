<?php

use Illuminate\Database\Seeder;

class permissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pact_permissions')->insert([
            'permissionName' => Str::random(10),
            'permissionUrl' => Str::random(10),
            'customData' => Str::random(20),
            'status' => 0,
            'createdBy' => 1,
        ]);
    }
}
