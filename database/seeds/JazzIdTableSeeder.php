<?php

use Illuminate\Database\Seeder;
use \App\JazzId;
class JazzIdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->jazz_id_1();
        $this->jazz_id_2();
        $this->jazz_id_3();
    }

    public function jazz_id_1() {
        $jazz_id = new JazzId;
        $jazz_id->jazz_transection_id = '12345';
        $jazz_id->contact_no = '6789107676';
        $jazz_id->advisor_id_fk = '1';
        $jazz_id->save();
    }

    public function jazz_id_2() {
        $jazz_id = new JazzId;
        $jazz_id->jazz_transection_id = '54321';
        $jazz_id->contact_no = '000232312';
        $jazz_id->advisor_id_fk = '2';
        $jazz_id->save();
    }

    public function jazz_id_3() {
        $jazz_id = new JazzId;
        $jazz_id->jazz_transection_id = '456789';
        $jazz_id->contact_no = '11122209839';
        $jazz_id->advisor_id_fk = '3';
        $jazz_id->save();
    }
}
