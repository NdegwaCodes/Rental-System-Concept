<?php

use Illuminate\Database\Seeder;
use \App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->admin1();
       $this->admin2();
       $this->admin3();
       
       $this->tenet1();
       $this->tenet2();
       $this->tenet3();

       $this->advisor1();
       $this->advisor2();
       $this->advisor3();
    }
    public function admin1() {
        $user =  new User;
        $user->email='admiin@1.com';
        $user->password=bcrypt('a');
        $user->profile_img='pp.png';
        $user->role_id_fk=1;
        $user->save();
    }

    public function admin2(){
        $user =  new User;
        $user->email='admiin@2.com';
        $user->password=bcrypt('a');
        $user->profile_img='pp.png';
        $user->role_id_fk=1;
        $user->save();
    }

    public function admin3() {
        $user =  new User;
        $user->email='admiin@3.com';
        $user->password=bcrypt('a');
        $user->profile_img='pp.png';
        $user->role_id_fk=1;
        $user->save();
    }
    
    public function tenet1() {
        $user =  new User;
        $user->email='tenet@1.com';
        $user->password=bcrypt('a');
        $user->profile_img='pp.png';
        $user->role_id_fk=2;
        $user->save();
    }

    public function tenet2(){
        $user =  new User;
        $user->email='tenet@2.com';
        $user->password=bcrypt('a');
        $user->profile_img='pp.png';
        $user->role_id_fk=2;
        $user->save();
    }

    public function tenet3() {
        $user =  new User;
        $user->email='tenet@3.com';
        $user->password=bcrypt('a');
        $user->profile_img='pp.png';
        $user->role_id_fk=2;
        $user->save();
    }

    public function advisor1() {
        $user =  new User;
        $user->email='advisor@1.com';
        $user->password=bcrypt('a');
        $user->profile_img='pp.png';
        $user->role_id_fk=3;
        $user->save();
    }

    public function advisor2(){
        $user =  new User;
        $user->email='advisor@2.com';
        $user->password=bcrypt('a');
        $user->profile_img='pp.png';
        $user->role_id_fk=3;
        $user->save();
    }

    public function advisor3() {
        $user =  new User;
        $user->email='advisor@3.com';
        $user->password=bcrypt('a');
        $user->profile_img='pp.png';
        $user->role_id_fk=3;
        $user->save();
    }
    
}
