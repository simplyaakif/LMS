<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateStaffTable extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('staff', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                // Personal Details
                $table->string('full_name');
                $table->string('profile_picture')->nullable();
                $table->string('cnic');
                $table->string('father_name');
                $table->string('gender');
                $table->date('date_of_birth');
                $table->string('marital_status')->nullable();
                //  Contact Details
                $table->string('mobile_number');
                $table->string('phone_number')->nullable();
                $table->text('address')->nullable();
                $table->string('country')->nullable();
                // Professional Details
                $table->string('qualification')->nullable();
                $table->string('position')->nullable();
                $table->string('job_title');
                $table->string('user_role');
                $table->string('experience')->nullable();
                // Salary Details
                $table->string('salary_type')->nullable();
                $table->string('basic_salary')->nullable();
                $table->string('conveyance')->nullable();
                $table->string('medical')->nullable();
                // Additional Information
                $table->json('additional_information')->nullable();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('staff');
        }
    }
