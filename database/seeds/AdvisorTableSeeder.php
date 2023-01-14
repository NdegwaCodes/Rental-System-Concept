<?php

use Illuminate\Database\Seeder;
use \App\RegisterAdvisor;
class AdvisorTableSeeder extends Seeder
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
        $reg_advisor = new RegisterAdvisor;
        $reg_advisor ->first_name = 'Rana';
        $reg_advisor ->last_name = 'Abdul majeed';
        $reg_advisor ->ntn = '1234';
        $reg_advisor ->cnic = '3610274376841284';
        $reg_advisor ->brand = 'RanaAdvisor';
        $reg_advisor ->phone = '+3334234';
        $reg_advisor ->address = 'lhr';
        $reg_advisor ->user_id_fk = '7'; 
        $reg_advisor ->is_recived = 1;
        $reg_advisor ->is_upgrated = 1;
        $reg_advisor->save();
    }
    
    public function detail_2() {
        $reg_advisor = new RegisterAdvisor;
        $reg_advisor ->first_name = 'Rana';
        $reg_advisor ->last_name = 'Abdul majeed';
        $reg_advisor ->ntn = '1234324';
        $reg_advisor ->cnic = '3610241284099009';
        $reg_advisor ->brand = 'KingAdvisor';
        $reg_advisor ->phone = '+339898924';
        $reg_advisor ->address = 'lhr';
        $reg_advisor ->user_id_fk = '8'; 
        $reg_advisor ->is_recived = 1;
        $reg_advisor ->is_upgrated = 1;
        $reg_advisor->save();
    }

    public function detail_3() {
        $reg_advisor = new RegisterAdvisor;
        $reg_advisor ->first_name = 'Rana';
        $reg_advisor ->last_name = 'Abdul majeed';
        $reg_advisor ->ntn = '123423434';
        $reg_advisor ->cnic = '3616878989890092';
        $reg_advisor ->brand = 'AbAdvisor';
        $reg_advisor ->phone = '+3234234234';
        $reg_advisor ->address = 'lhr';
        $reg_advisor ->user_id_fk = '9'; 
        $reg_advisor ->is_recived = 1;
        $reg_advisor ->is_upgrated = 1;
        $reg_advisor->save();
    }
}
