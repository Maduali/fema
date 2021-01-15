<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Idps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('idps', function (Blueprint $table) {
            $table->string('main_id');
            $table->string('household_name');
            $table->string('location');
            $table->date('dob');
            $table->string('gender');
            $table->string('state');
            $table->string('lga');
            $table->string('village');
            $table->string('education');
            $table->string('occupation');
            $table->string('preferred_skill');
            $table->string('cause');
            $table->string('status');
            $table->string('telly');
            $table->string('email');
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
        Schema::dropIfExists('idps');
    }
}
