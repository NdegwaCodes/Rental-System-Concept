<?php

use Illuminate\Database\Seeder;
use \App\RegisterAdmin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        $this->detail_1();
        $this->detail_2();
        $this->detail_3();
        
    }
    public function detail_1() {
        $reg_admin = new RegisterAdmin;
        $reg_admin ->first_name = 'Rana';
        $reg_admin ->last_name = 'Abdul majeed';
        $reg_admin ->phone = '+3334234';
        $reg_admin ->address = 'lhr';
        $reg_admin ->user_id_fk = '1'; 
        $reg_admin->save();
    }
    
    public function detail_2() {
        $reg_admin = new RegisterAdmin;
        $reg_admin ->first_name = 'Ali';
        $reg_admin ->last_name = 'Hamza';
        $reg_admin ->phone = '+34342';
        $reg_admin ->address = 'Multan';
        $reg_admin ->user_id_fk = '2';
        $reg_admin->save(); 
    }

    public function detail_3() {
        $reg_admin = new RegisterAdmin;
        $reg_admin ->first_name = 'Rana';
        $reg_admin ->last_name = 'Aqeel';
        $reg_admin ->phone = '+55676776';
        $reg_admin ->address = 'Kahnewal';
        $reg_admin ->user_id_fk = '3'; 
        $reg_admin->save();
    }
}
