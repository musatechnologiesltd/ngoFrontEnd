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
        Schema::create('fd_o9_forms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fd_one_form_id')->unsigned();
            $table->foreign('fd_one_form_id')->references('id')->on('fd_one_forms')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('husband_or_wife_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('dob')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('identification_mark_given_in_passport')->nullable();
            $table->string('male_or_female')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('nationality_or_citizenship')->nullable();
            $table->string('details_if_multiple_citizenships')->nullable();
            $table->string('previous_citizenship_is_grounds_for_non_retention')->nullable();
            $table->string('current_address')->nullable();
            $table->string('number_of_family_members')->nullable();
            $table->string('academic_qualification')->nullable();
            $table->string('technical_and_other_qualifications_if_any')->nullable();
            $table->string('past_experience')->nullable();
            $table->string('countries_that_have_traveled')->nullable();
            $table->string('offered_post')->nullable();
            $table->string('name_of_proposed_project')->nullable();
            $table->string('date_of_appointment')->nullable();
            $table->string('extension_date')->nullable();
            $table->string('post_available_for_foreigner_and_working')->nullable();
            $table->string('previous_work_experience_in_bangladesh')->nullable();
            $table->string('total_foreigner_working')->nullable();
            $table->string('other_information')->nullable();
            $table->string('foreigner_passport_size_photo')->nullable();
            $table->string('copy_of_passport')->nullable();
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
        Schema::dropIfExists('fd_o9_forms');
    }
};
