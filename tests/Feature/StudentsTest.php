<?php

    namespace Tests\Feature;

    use App\Models\Student;
    use Carbon\Carbon;
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Illuminate\Foundation\Testing\WithFaker;
    use Tests\TestCase;

    class StudentsTest extends TestCase {

        use DatabaseMigrations;

        /** @test */
        public function user_can_see_a_student()
        {
            $this->withoutExceptionHandling();
            $student = Student::create([
                                           'name'                   => 'Abdullah',
                                           'registration_number'    => '100490',
                                           'profile_picture'        => null,
                                           'date_of_birth'          => Carbon::parse('1992-05-27'),
                                           'gender'                 => 'Male',
                                           'cnic'                   => '3630242909178',
                                           'first_language'         => 'Urdu',
                                           'mobile_number'          => '03335335792',
                                           'phone_number'           => '123456',
                                           'address'                => 'Passport Office',
                                           'city'                   => 'Islamabad',
                                           'country'                => 'Pakistan',
                                           'additional_information' => '{"age":{"label":"Age","value":28}"}',

                                       ]);
            $view    = $this->get('/student/' . $student->id);
            $view->assertSee('Abdullah');
            $view->assertSee('100490');
            $view->assertSee('27 May 1992');
            $view->assertSee('Male');
            $view->assertSee('3630242909178');
            $view->assertSee('Urdu');
            $view->assertSee('03335335792');
            $view->assertSee('123456');
            $view->assertSee('Passport Office');
            $view->assertSee('Islamabad');
            $view->assertSee('Pakistan');
            $view->assertSee('28');
        }
    }
