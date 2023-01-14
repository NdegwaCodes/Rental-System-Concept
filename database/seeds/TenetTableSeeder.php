<?php

use Illuminate\Database\Seeder;
use \App\RegisterTenet;
class TenetTableSeeder extends Seeder
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
        $reg_ten = new RegisterTenet;
        $reg_ten ->first_name = 'Abdullah';
        $reg_ten ->last_name = 'Iftikhar';
        $reg_ten ->phone = '+923017160701';
        $reg_ten ->address = 'Khanewal';
        $reg_ten ->user_id_fk = '4'; 
        $reg_ten->save();
    }
    
    public function detail_2() {
        $reg_ten = new RegisterTenet;
        $reg_ten ->first_name = 'Ali';
        $reg_ten ->last_name = 'Hamza';
        $reg_ten ->phone = '+923078701';
        $reg_ten ->address = 'Multan';
        $reg_ten ->user_id_fk = '5'; 
        $reg_ten->save();
    }

    public function detail_3() {
        $reg_ten = new RegisterTenet;
        $reg_ten ->first_name = 'Rana';
        $reg_ten ->last_name = 'Muzammil';
        $reg_ten ->phone = '+55676776';
        $reg_ten ->address = 'Lahore';
        $reg_ten ->user_id_fk = '6'; 
        $reg_ten->save();
    }
}
