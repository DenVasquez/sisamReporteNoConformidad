<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sisam_user_types')->insert([
            [
                'user_type_name' => 'CEO',
                'user_type_state' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_type_name' => 'Developer',
                'user_type_state' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
