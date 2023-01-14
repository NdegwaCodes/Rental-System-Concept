<?php

use Illuminate\Database\Seeder;
use \App\AdvisorPost;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // post for advisor 1
        $this->post_1();
        $this->post_2();
        $this->post_3();
        $this->post_4();
        $this->post_5();
        //post for advisr 2
        $this->post_6();
        $this->post_7();
        $this->post_8();
        $this->post_8();
        $this->post_10();
        //post for advisor 3
        $this->post_11();
        $this->post_12();
        $this->post_13();
        $this->post_14();
        $this->post_15();

    }
    // For Advsor 1
    public function post_1() {
        $post = new AdvisorPost;
        $post->area = '1200';
        $post->garage = '1';
        $post->bathroom = '3';
        $post->bedroom = '3';
        $post->ownername = 'Abdullah';
        $post->rent = '15000';
        $post->city = 'Kahnewal';
        $post->state = 'Punjab';
        $post->address = 'colony no 3 khanewal';
        $post->description = 'This is very beautifull home';
        $post->image = '14.jpg';
        $post->advisor_id_fk = '1';
        $post->save();
    }

    public function post_2() {
        $post = new AdvisorPost;
        $post->area = '550';
        $post->garage = '1';
        $post->bathroom = '2';
        $post->bedroom = '2';
        $post->ownername = 'Ali zia';
        $post->rent = '17000';
        $post->city = 'Multan';
        $post->state = 'Punjab';
        $post->address = 'DHA Multan';
        $post->description = 'Very beautifull home';
        $post->image = '2.jpg';
        $post->advisor_id_fk = '1';
        $post->save();
    }

    public function post_3() {
        $post = new AdvisorPost;
        $post->area = '700';
        $post->garage = '1';
        $post->bathroom = '2';
        $post->bedroom = '3';
        $post->ownername = 'Abdul Majeed';
        $post->rent = '12000';
        $post->city = 'Lahore';
        $post->state = 'Punjab';
        $post->address = 'shadhra lahore';
        $post->description = 'Very beautifull';
        $post->image = '3.jpg';
        $post->advisor_id_fk = '1';
        $post->save();
    }

    public function post_4() {
        $post = new AdvisorPost;
        $post->area = '13000';
        $post->garage = '2';
        $post->bathroom = '4';
        $post->bedroom = '4';
        $post->ownername = 'Ibraheem';
        $post->rent = '45000';
        $post->city = 'Karachi';
        $post->state = 'Sindh';
        $post->address = 'Karachi Behria Town';
        $post->description = 'Behria town is a awesom town';
        $post->image = '4.jpg';
        $post->advisor_id_fk = '1';
        $post->save();
    }

    public function post_5() {
        $post = new AdvisorPost;
        $post->area = '1000';
        $post->garage = '2';
        $post->bathroom = '8';
        $post->bedroom = '6';
        $post->ownername = 'ALi Ahmad';
        $post->rent = '16000';
        $post->city = 'Khanewal';
        $post->state = 'Punjab';
        $post->address = 'Khanewal';
        $post->description = 'very awesom';
        $post->image = '5.jpg';
        $post->advisor_id_fk = '1';
        $post->save();
    }

    // for advisor 2
    public function post_6() {
        $post = new AdvisorPost;
        $post->area = '1900';
        $post->garage = '3';
        $post->bathroom = '8';
        $post->bedroom = '6';
        $post->ownername = 'Hammza';
        $post->rent = '23000';
        $post->city = 'Karachi';
        $post->state = 'Sindh';
        $post->address = 'Karachi gwal mandi';
        $post->description = 'Karachi';
        $post->image = '6.jpg';
        $post->advisor_id_fk = '2';
        $post->save();
    }

    public function post_7() {
        $post = new AdvisorPost;
        $post->area = '850';
        $post->garage = '1';
        $post->bathroom = '2';
        $post->bedroom = '2';
        $post->ownername = 'Ali Zaib';
        $post->rent = '17000';
        $post->city = 'Khanewal';
        $post->state = 'Punjab';
        $post->address = 'colony no 2 kahnewal';
        $post->description = 'supperb';
        $post->image = '7.jpg';
        $post->advisor_id_fk = '2';
        $post->save();
    }

    public function post_8() {
        $post = new AdvisorPost;
        $post->area = '300';
        $post->garage = '0';
        $post->bathroom = '1';
        $post->bedroom = '2';
        $post->ownername = 'Babber';
        $post->rent = '23000';
        $post->city = 'Lahore';
        $post->state = 'Punjab';
        $post->address = 'Central park lahore';
        $post->description = 'awesom';
        $post->image = '8.jpg';
        $post->advisor_id_fk = '2';
        $post->save();
    }

    public function post_9() {
        $post = new AdvisorPost;
        $post->area = '200';
        $post->garage = '1';
        $post->bathroom = '1';
        $post->bedroom = '1';
        $post->ownername = 'usman';
        $post->rent = '20000';
        $post->city = 'Sahiwal';
        $post->state = 'Punjab';
        $post->address = 'fasiel town';
        $post->description = 'awesom';
        $post->image = '9.jpg';
        $post->advisor_id_fk = '2';
        $post->save();
    }

    public function post_10() {
        $post = new AdvisorPost;
        $post->area = '14000';
        $post->garage = '1';
        $post->bathroom = '3';
        $post->bedroom = '2';
        $post->ownername = 'Tahir Manzoor';
        $post->rent = '27000';
        $post->city = 'Karachi';
        $post->state = 'Sindh';
        $post->address = 'karachi city';
        $post->description = 'awesom';
        $post->image = '10.jpg';
        $post->advisor_id_fk = '2';
        $post->save();
    }

    //for advisor 3
    public function post_11() {
        $post = new AdvisorPost;
        $post->area = '1200';
        $post->garage = '1';
        $post->bathroom = '4';
        $post->bedroom = '3';
        $post->ownername = 'Usman';
        $post->rent = '22000';
        $post->city = 'Islamabad';
        $post->state = 'Punjab';
        $post->address = 'Isalmabad Kamboh Town';
        $post->description = 'awesom';
        $post->image = '11.jpg';
        $post->advisor_id_fk = '3';
        $post->save();
    }

    public function post_12() {
        $post = new AdvisorPost;
        $post->area = '500';
        $post->garage = '0';
        $post->bathroom = '3';
        $post->bedroom = '2';
        $post->ownername = 'ALi Hassan';
        $post->rent = '15000';
        $post->city = 'Karachi';
        $post->state = 'Sindh';
        $post->address = 'karachi tofail hotel';
        $post->description = 'awesom';
        $post->image = '12.jpg';
        $post->advisor_id_fk = '3';
        $post->save();
    }

    public function post_13() {
        $post = new AdvisorPost;
        $post->area = '6000';
        $post->garage = '3';
        $post->bathroom = '8';
        $post->bedroom = '7';
        $post->ownername = 'Hassan Ali';
        $post->rent = '55000';
        $post->city = 'Sahiwal';
        $post->state = 'Punjab';
        $post->address = 'sahiwal faisel town';
        $post->description = 'awesom';
        $post->image = '13.jpg';
        $post->advisor_id_fk = '3';
        $post->save();
    }

    public function post_14() {
        $post = new AdvisorPost;
        $post->area = '5100';
        $post->garage = '2';
        $post->bathroom = '3';
        $post->bedroom = '4';
        $post->ownername = 'Ali Zaib';
        $post->rent = '52000';
        $post->city = 'Sahiwal';
        $post->state = 'Punjab';
        $post->address = 'Sahiwal Abdullah town';
        $post->description = 'awesom';
        $post->image = '14.jpg';
        $post->advisor_id_fk = '3';
        $post->save();
    }

    public function post_15() {
        $post = new AdvisorPost;
        $post->area = '2300';
        $post->garage = '2';
        $post->bathroom = '6';
        $post->bedroom = '5';
        $post->ownername = 'Abdullah';
        $post->rent = '52000';
        $post->city = 'CoatAddo';
        $post->state = 'Punjab';
        $post->address = 'CoatAddo Tehseel town';
        $post->description = 'awesom';
        $post->image = '15.jpg';
        $post->advisor_id_fk = '3';
        $post->save();
    }
}



