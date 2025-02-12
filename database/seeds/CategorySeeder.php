<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Beaches'
            ],
            [
                'name' => 'Historical Buildings'
            ],
            [
                'name' => 'Mountains'
            ],
            [
                'name' => 'National Parks'
            ],
            [
                'name' => 'Museums'
            ],
            [
                'name' => 'Zoos'
            ],
        ]);
    }
}
