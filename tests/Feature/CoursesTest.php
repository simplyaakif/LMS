<?php

    namespace Tests\Feature;

    use App\Models\Course;
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Illuminate\Foundation\Testing\WithFaker;
    use Tests\TestCase;

    class CoursesTest extends TestCase {

        use DatabaseMigrations;

        /** @test */
        public function user_can_view_a_course()
        {
            $this->withoutExceptionHandling();
            $course = Course::create([
                                         'title'                  => 'Laravel',
                                         'duration'               => '2 Month',
                                         'fee'                    => '22500',
                                         'additional_information' => ''
                                     ]);
            $view   = $this->get('/course/' . $course->id);
            $view->assertSee('Laravel');
            $view->assertSee('2 Month');
            $view->assertSee('22500');

        }

        /** @test */
        public function user_can_create_a_course()
        {
            $this->withoutExceptionHandling();
            $view   = $this->post('/course/', [
                'title'                  => 'Laravel',
                'duration'               => '2 Month',
                'fee'                    => '22500',
                'additional_information' => ''
            ]);
            $course = Course::firstOrFail();
            $this->assertEquals('Laravel', $course->title);
            $this->assertEquals('2 Month', $course->duration);
            $this->assertEquals('22500', $course->fee);
        }

        /** @test */
        public function user_can_update_a_course()
        {
            $this->withoutExceptionHandling();
            $course = Course::create([
                                         'title'                  => 'Laravel',
                                         'duration'               => '2 Month',
                                         'fee'                    => '22500',
                                         'additional_information' => ''
                                     ]);
            $course_array = [
                'title'                  => 'Node JS',
                'duration'               => '3 Month',
                'fee'                    => '35000',
                'additional_information' => ''
            ];
            $update = ['course_id'=>$course->id,'course'=>$course_array];
            $view   = $this->put('/course/' , $update);

            $assert_course = Course::firstOrFail();
            $this->assertEquals('Node JS', $assert_course->title);
            $this->assertEquals('3 Month', $assert_course->duration);
            $this->assertEquals('35000', $assert_course->fee);

        }

        /** @test */
        public function user_can_delete_a_course()
        {
//            $this->withoutExceptionHandling();
            $course = Course::create([
                                         'title'                  => 'Laravel',
                                         'duration'               => '2 Month',
                                         'fee'                    => '22500',
                                         'additional_information' => ''
                                     ]);
            $view= $this->delete('/course/'.$course->id);
            $view->assertStatus(200);
            $this->assertEmpty(Course::first());
        }
    }
