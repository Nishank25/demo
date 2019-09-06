<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeders::class);
        $this->call(CompanySeeders::class);
        $this->call(UsersSeeders::class);
        $this->call(CompanyOwnerSeeders::class);
        $this->call(CompanyUserSeeders::class);
        $this->call(UserPermissionsSeeders::class);
        $this->call(ProductSeeder::class);
        $this->call(VariationSeeder::class);
        $this->call(ProductVariationSeeder::class);
    }
}
