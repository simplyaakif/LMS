<?php

    namespace Database\Factories;

    use App\Models\Employee;
    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Factories\Factory;

    class EmployeeFactory extends Factory {

        /**
         * The name of the factory's corresponding model.
         *
         * @var string
         */
        protected $model = Employee::class;

        /**
         * Define the model's default state.
         *
         * @return array
         */
        public function definition()
        {
            return [
                'full_name'     => 'Aakif Raza',
                'father_name'   => 'Muhammad Ashraf Raza',
                'gender'        => 'Male',
                'cnic'          => '3640242809177',
                'date_of_birth' => Carbon::parse('2020-10-16'),
                'mobile_number' => '03320913468',
                'job_title'     => '03320913468',
                'user_role'     => 'Admin',
            ];
        }
    }
