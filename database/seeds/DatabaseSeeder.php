<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FacksSeeder::class);
        $this->call(BellsSeeder::class);
        $this->call(GroupsSeeder::class);
        $this->call(RaspSeeder::class);
    }
}
