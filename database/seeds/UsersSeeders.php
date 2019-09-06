<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_id = \App\Models\Role::where('name','Admin')->select('id')->first();
        DB::table('users')->insert([
        [
            'name' => 'Admin',
            'details' => 'Admin User',
            'role_id' => $role_id->id,
            'company_id' => null,
            'email' => 'admin@demo.app',
            'password' => bcrypt('admin123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]
    ]);
    }
}
