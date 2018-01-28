<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin')->delete();
        
        \DB::table('admin')->insert(array (
            0 => 
            array (
                'id' => 1,
                'email' => 'admin@admin.com',
                'password' => '$2y$10$G8ILTi8Gmte4Te51RNAj2OiQ2zI5H3SNUfypMHV/MYoAe7J1v8XJ2',
                'remember_token' => 'RKmUzxDZ2eqlbeviMRjAW7zuUi01kIuJHlKa5axSaB2mog7Emxd3FvG1GtH7',
                'created_at' => NULL,
                'updated_at' => '2017-12-10 20:54:25',
                'name' => 'admin',
            ),
        ));
        
        
    }
}