<?php

    namespace Tests\Feature;

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
            $user = User::create([
                                     'name'     => 'Aakif Raza',
                                     'email'    => 'simply.aakif@gmail.com',
                                     'password' => bcrypt('A123456a*')
                                 ]);
            $view = $this->get('/staff/user/' . $user->id);
            $view->assertStatus(200);
            $view->assertSee('Aakif Raza');
            $view->assertSee('simply.aakif@gmail.com');
        }


        /** @test */

        public function user_can_create_a_user()
        {
            $this->withoutExceptionHandling();
            $user = [
                'user' => [
                    'name'     => 'Aakif Raza',
                    'email'    => 'simply.aakif@gmail.com',
                    'password' => 'A123456a*'
                ]
            ];
            $view = $this->post('/staff/user', $user);
            $view->assertStatus(201);

            $user = User::firstOrFail();
            $this->assertEquals('Aakif Raza', $user->name);
            $this->assertEquals('simply.aakif@gmail.com', $user->email);
        }

        /** @test */
        public function user_can_edit_a_user()
        {
            $this->withoutExceptionHandling();
            $user = User::create([
                                     'name'     => 'Aakif Raza',
                                     'email'    => 'simply.aakif@gmail.com',
                                     'password' => 'A123456a*'
                                 ]);
            $user = User::firstOrFail();

            $user_update = [
                'name'  => 'Muhammad Aakif Raza',
                'email' => 'simply.aakif@email.com',
            ];
            $view        = $this->put('/staff/user', [
                'user_id'     => $user->id,
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
            $user = User::create([
                                     'name'     => 'Aakif Raza',
                                     'email'    => 'simply.aakif@gmail.com',
                                     'password' => 'A123456a*'
                                 ]);
            $user = User::firstOrFail();
            $view = $this->delete('/staff/user/', ['user_id' => $user->id]);
            $view->assertStatus(200);
            $this->assertEmpty(User::first());
        }

    }
