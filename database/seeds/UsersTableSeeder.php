<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sisam_users')->insert([
            [
                'user_name'       => 'Gonzalo',
                'user_first_name' => 'Montoya',
                'user_last_name'  => 'Ortiz',
                'user_ci'         => '6991768',
                'email'      => 'gonxa@mortiz.bo',
                'password'   => bcrypt('holamundo'),
                'role_id'    => 1,
                'user_types_id' => 1,
                'user_state' => 1
            ],
        ]);
    }
}
