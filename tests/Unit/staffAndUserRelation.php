<?php

    namespace Tests\Unit;

    use App\Models\Staff;
    use App\Models\User;
    use Carbon\Carbon;
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    use Tests\TestCase;

    class staffAndUserRelation extends TestCase {

        use DatabaseMigrations;

        /** @test */
        public function a_staff_member_has_user()
        {
            $staff = Staff::factory()->create();
            $user  = User::factory()->create(['staff_id' => $staff->id]);

            $this->assertEquals($user->name, $staff->user->name);
            $this->assertEquals($user->email, $staff->user->email);
        }

        /** @test */
        public function a_user_belongs_to_a_staff_member()
        {
            $staff = Staff::factory()->create();
            $user  = User::factory()->create(['staff_id' => $staff->id]);

            $this->assertEquals($staff->full_name, $user->staff->full_name);
            $this->assertEquals($staff->mobile_number, $user->staff->mobile_number);

        }

    }
