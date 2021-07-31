<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empdatas', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email');
            $table->string('contact');
            $table->string('guardian_contact');
            $table->string('last_company');
            $table->string('resume');
            $table->longText('p_address');
            $table->string('p_city');
            $table->string('p_state');
            $table->string('p_pincode');

            $table->longText('c_address');
            $table->string('c_city');
            $table->string('c_state');
            $table->string('c_pincode');

            $table->string('higherqualification_ctft');
            $table->string('professional_ctft');
            $table->string('exp_letter');
            $table->string('salary_slip');
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
        Schema::dropIfExists('empdatas');
    }
}
