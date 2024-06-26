<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('disease');
            $table->dateTime('appointment_date');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
