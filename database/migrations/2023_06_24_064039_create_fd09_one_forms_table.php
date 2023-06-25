<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fd09_one_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('foreigner_name_for_subject')->nullable();
            $table->string('sarok_number')->nullable();
            $table->string('application_date')->nullable();
            $table->string('institute_name')->nullable();
            $table->string('prokolpo_name')->nullable();
            $table->string('designation_name')->nullable();
            $table->string('foreigner_name_for_body')->nullable();
            $table->string('expire_date')->nullable();
            $table->string('attestation_of_appointment_letter')->nullable();
            $table->string('copy_of_form_nine')->nullable();
            $table->string('foreigner_image')->nullable();
            $table->string('arrival_date_in_nvisa')->nullable();
            $table->string('copy_of_nvisa')->nullable();
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
        Schema::dropIfExists('fd09_one_forms');
    }
};
