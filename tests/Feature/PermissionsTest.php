<?php

    namespace Tests\Feature;

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
            $user = User::factory()->create(['email' => 'asmat@example.com']);
//          Act
            $user->assignRole('fdo');
            $user->getRoleNames();
//          Assert
            $this->assertEquals('asmat@example.com', $user->email);
            $this->assertStringContainsString('fdo', $user->getRoleNames());
        }
    }
