<?php

    namespace Tests\Feature;

    use App\Models\Employee;
    use App\Models\User;
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Illuminate\Foundation\Testing\WithFaker;
    use Tests\TestCase;

    class UsersTest extends TestCase {

        use DatabaseMigrations;

        /** @test */
        public function user_can_see_a_user()
        {
            $this->withoutExceptionHandling();
            $employee = Employee::factory()->create();
            $employee->user()->create([
                                        'name'        => 'Aakif Raza',
                                        'email'       => 'simply.aakif@gmail.com',
                                        'password'    => bcrypt('A123456a*'),
                                    ]);
            $view     = $this->get('/employee/user/' . $employee->user->id);
            $view->assertStatus(200);
            $view->assertSee('Aakif Raza');
            $view->assertSee('simply.aakif@gmail.com');
        }


        /** @test */

        public function user_can_create_a_user()
        {
            $this->withoutExceptionHandling();
            $employee = Employee::factory()->create();
            $user = [
                'employee_id'=>$employee->id,
                'user' => [
                    'name'     => 'Aakif Raza',
                    'email'    => 'simply.aakif@gmail.com',
                    'password' => 'A123456a*'
                ]
            ];
            $view = $this->post('/employee/user', $user);
            $view->assertStatus(200);

            $this->assertEquals('Aakif Raza', $employee->user->name);
            $this->assertEquals('simply.aakif@gmail.com', $employee->user->email);
        }

        /** @test */
        public function user_can_edit_a_user()
        {
            $this->withoutExceptionHandling();
            $employee = Employee::factory()->create();
            $employee->user()->create([
                                     'name'     => 'Aakif Raza',
                                     'email'    => 'simply.aakif@gmail.com',
                                     'password' => 'A123456a*'
                                 ]);
            $user_update = [
                'name'  => 'Muhammad Aakif Raza',
                'email' => 'simply.aakif@email.com',
            ];
            $view        = $this->put('/employee/user', [
                'employee_id'     => $employee->user->id,
                'user_update' => $user_update
            ]);
            $user        = User::firstOrFail();
            $view->assertStatus(200);
            $this->assertEquals('Muhammad Aakif Raza', $user->name);
            $this->assertEquals('simply.aakif@email.com', $user->email);
        }

        /** @test */
        public function user_can_delete_a_user()
        {
            $this->withoutExceptionHandling();
            $employee = Employee::factory()->create();
            $employee->user()->create([
                                     'name'     => 'Aakif Raza',
                                     'email'    => 'simply.aakif@gmail.com',
                                     'password' => 'A123456a*'
                                 ]);
            $view = $this->delete('/employee/user/', ['employee_id' => $employee->id]);
            $view->assertStatus(200);
            $this->assertEmpty($employee->user);
        }

    }
