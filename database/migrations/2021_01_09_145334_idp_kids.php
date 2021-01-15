<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class IdpKids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('idpkids', function (Blueprint $table) {
            $table->string('main_id');
            $table->string('household_name');
            $table->string('child_name');
            $table->date('dob');
            $table->string('gender');
            $table->string('disability');
            $table->string('education');
            $table->string('occupation');
            $table->string('preferred_skill');
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
        Schema::dropIfExists('idpkids');
    }
}
