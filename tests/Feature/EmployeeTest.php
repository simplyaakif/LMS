<?php

    namespace Tests\Feature;

    use App\Models\Employee;
    use Carbon\Carbon;
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    use Tests\TestCase;

    class EmployeeTest extends TestCase {

        use DatabaseMigrations;

        /** @test */
        public function user_can_view_a_employee_member()
        {
            $this->withoutExceptionHandling();
            $employee = Employee::create([
                                       'full_name'     => 'Aakif Raza',
                                       'father_name'   => 'Muhammad Ashraf Raza',
                                       'gender'        => 'Male',
                                       'cnic'          => '3640242809177',
                                       'date_of_birth' => Carbon::parse('2020-10-16'),
                                       'mobile_number' => '03320913468',
                                       'job_title'     => '03320913468',
                                       'user_role'     => 'Admin',
                                   ]);
            $view  = $this->get('/employee/' . $employee->id);
            $view->assertSee('Aakif Raza');
        }

        /** @test */
        public function user_can_create_a_employee_member()
        {
            $this->withoutExceptionHandling();
            $view = $this->post('/employee/', [
                'member' => [
                    'full_name'     => 'Aakif Raza',
                    'father_name'   => 'Muhammad Ashraf Raza',
                    'gender'        => 'Male',
                    'cnic'          => '3640242809177',
                    'date_of_birth' => Carbon::parse('2020-10-16'),
                    'mobile_number' => '03320913468',
                    'job_title'     => '03320913468',
                    'user_role'     => 'Admin',
                ]
            ]);

            $view->assertSee('Aakif Raza');
        }

        /** @test */
        public function user_can_update_a_employee_member()
        {
            $this->withoutExceptionHandling();
            $employee         = Employee::create([
                                               'full_name'     => 'Aakif Raza',
                                               'father_name'   => 'Muhammad Ashraf Raza',
                                               'gender'        => 'Male',
                                               'cnic'          => '3640242809177',
                                               'date_of_birth' => Carbon::parse('2020-10-16'),
                                               'mobile_number' => '03320913468',
                                               'job_title'     => '03320913468',
                                               'user_role'     => 'Admin',
                                           ]);
            $update_member = [
                'full_name'     => 'Muhammad Aakif Raza',
                'father_name'   => 'Muhammad Ashraf Raza',
                'gender'        => 'Male',
                'cnic'          => '3640242809177',
                'date_of_birth' => Carbon::parse('2020-10-16'),
                'mobile_number' => '03320913468',
                'job_title'     => '03320913468',
                'user_role'     => 'Admin',
            ];

            $view = $this->put('/employee/', [
                'id'            => $employee->id,
                'update_member' => $update_member
            ]);
            $view->assertSee('Muhammad Aakif Raza');

        }

        /** @test */
        public function a_user_can_delete_a_employee_member()
        {
            $this->withoutExceptionHandling();
            $employee = Employee::create([
                                       'full_name'     => 'Aakif Raza',
                                       'father_name'   => 'Muhammad Ashraf Raza',
                                       'gender'        => 'Male',
                                       'cnic'          => '3640242809177',
                                       'date_of_birth' => Carbon::parse('2020-10-16'),
                                       'mobile_number' => '03320913468',
                                       'job_title'     => '03320913468',
                                       'user_role'     => 'Admin',
                                   ]);
            $view  = $this->delete('/employee/', ['id' => $employee->id]);
            $this->assertEmpty(Employee::first());

        }
    }
