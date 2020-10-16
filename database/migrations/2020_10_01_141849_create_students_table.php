<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    use phpDocumentor\Reflection\Types\Nullable;

    class CreateStudentsTable extends Migration {

        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->date('date_of_birth');
                $table->string('registration_number');
                $table->string('profile_picture')->nullable();
                $table->string('gender');
                $table->string('cnic')->nullable();
                $table->string('first_language')->nullable();
                $table->string('mobile_number');
                $table->string('email')->nullable();
                $table->string('phone_number')->nullable();
                $table->string('address')->nullable();
                $table->string('city')->nullable();
                $table->string('country')->nullable();
                $table->json('additional_information')->nullable();
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
            Schema::dropIfExists('students');
        }
    }
