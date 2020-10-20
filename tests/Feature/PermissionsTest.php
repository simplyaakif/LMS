<?php

    namespace Tests\Feature;

    use App\Models\Employee;
    use App\Models\User;
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Illuminate\Foundation\Testing\WithFaker;
    use Tests\TestCase;

    class PermissionsTest extends TestCase {

        use DatabaseMigrations;

        protected function setUp(): void
        {
            parent::setUp();
            $this->artisan(' db:seed --class=PermissionsSeeder');
        }

        /** @test */
        public function a_user_is_logged_in()
        {
//          Arrange
            $employee = Employee::factory()->create();
            $employee->user()->create(['email' => 'asmat@example.com','name'=>'Asmat','password'=>bcrypt('password')]);
//          Act
            $employee->user->assignRole('fdo');
            $employee->user->getRoleNames();
//          Assert
            $this->assertEquals('asmat@example.com', $employee->user->email);
            $this->assertStringContainsString('fdo', $employee->user->getRoleNames());
        }
    }
