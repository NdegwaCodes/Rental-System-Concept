<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvisorPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisor_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('area');
            $table->string('garage');
            $table->string('bathroom');
            $table->string('bedroom');
            $table->string('ownername');
            $table->string('rent');
            $table->string('city');
            $table->string('state');
            $table->string('address');
            $table->string('description');
            $table->string('image')->nullable();;
            $table->string('advisor_id_fk');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advisor_posts');
    }
}
