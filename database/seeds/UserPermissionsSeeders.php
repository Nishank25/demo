<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserPermissionsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->adminPermissions();
        $this->companyOwnerPermissions();
        $this->companyUserPermissions();

    }
    function adminPermissions(){
        $adminUser = \App\User::where('role_id','1')->select('id')->first();

        $permission = array(
            config('constants.permissions.insert.key'),
            config('constants.permissions.update.key'),
            config('constants.permissions.delete.key'),
            config('constants.permissions.view.key'),
        );
        foreach ($permission as $p) {
            DB::table('user_permissions')->insert([
                [
                    'user_id' => $adminUser->id,
                    'permission_id' => $p,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ]);
        }
    }

    function companyOwnerPermissions(){
        $companyOwner = \App\User::where('role_id','2')->select('id')->first();

        $permission = array(
            config('constants.permissions.insert.key'),
            config('constants.permissions.update.key'),
            config('constants.permissions.delete.key'),
            config('constants.permissions.view.key'),
        );
        foreach ($permission as $p) {
            DB::table('user_permissions')->insert([
                [
                    'user_id' => $companyOwner->id,
                    'permission_id' => $p,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ]);
        }
    }

    function companyUserPermissions(){
        $companyUser = \App\User::where('role_id','3')->select('id')->first();

        $permission = array(
            config('constants.permissions.update.key'),
            config('constants.permissions.view.key'),
        );
        foreach ($permission as $p) {
            DB::table('user_permissions')->insert([
                [
                    'user_id' => $companyUser->id,
                    'permission_id' => $p,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            ]);
        }
    }
}
