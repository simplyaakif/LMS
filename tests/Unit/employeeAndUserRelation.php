<?php

    namespace Tests\Unit;

    use App\Models\Employee;
    use App\Models\User;
    use Carbon\Carbon;
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    use Tests\TestCase;

    class employeeAndUserRelation extends TestCase {

        use DatabaseMigrations;

        /** @test */
        public function a_employee_member_has_user()
        {
            $employee = Employee::factory()->create();
            $user  = User::factory()->create(['employee_id' => $employee->id]);

            $this->assertEquals($user->name, $employee->user->name);
            $this->assertEquals($user->email, $employee->user->email);
        }

        /** @test */
        public function a_user_belongs_to_a_employee_member()
        {
            $employee = Employee::factory()->create();
            $user  = User::factory()->create(['employee_id' => $employee->id]);

            $this->assertEquals($employee->full_name, $user->employee->full_name);
            $this->assertEquals($employee->mobile_number, $user->employee->mobile_number);

        }

    }
