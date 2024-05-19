<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
    use App\Models\Doctor;

return new class extends Migration
{

    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('doctor_id')->constrained('doctors');
            $table->foreign('doctor_id')->references('doctor_id')->on('doctor');

            $table->dateTime('appointment_date');
            $table->text('p_name');
            $table->text('notes');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
