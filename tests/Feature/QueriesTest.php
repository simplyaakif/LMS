<?php

    namespace Tests\Feature;

    use App\Models\Query;
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Illuminate\Foundation\Testing\WithFaker;
    use Tests\TestCase;

    class QueriesTest extends TestCase {

        use DatabaseMigrations;


        /** @test */
        public function user_can_view_a_query()
        {
            $this->withoutExceptionHandling();
            $query = Query::create([
                                       'name'                   => 'Abdullah',
                                       'mobile_number'          => '03365722334',
                                       'email'                  => 'abdul.iqra@gmail.com',
                                       'address'                => 'Passport Office',
                                       'dealt_by'               => '',
                                       'status'                 => 'Follow',
                                       'interaction_medium'     => 'Campus Visit',
                                       'additional_information' => ''
                                   ]);
            $view  = $this->get('/query/' . $query->id);
            $view->assertSee('Abdullah');
            $view->assertSee('03365722334');
            $view->assertSee('abdul.iqra@gmail.com');
            $view->assertSee('Passport Office');
            $view->assertSee('Follow');
            $view->assertSee('Campus Visit');
        }

        /** @test */
        public function user_can_create_a_query()
        {
            $this->withoutExceptionHandling();
            $query = [
                'name'                   => 'Abdullah',
                'mobile_number'          => '03365722334',
                'email'                  => 'abdul.iqra@gmail.com',
                'address'                => 'Passport Office',
                'dealt_by'               => '',
                'status'                 => 'Follow',
                'interaction_medium'     => 'Campus Visit',
                'additional_information' => ''
            ];
            $view  = $this->post('query', ['data' => $query]);
            $view->assertStatus(201);
            $query = Query::firstOrFail();
            $this->assertEquals('Abdullah', $query->name);

        }

        /** @test */
        public function user_can_update_a_query()
        {
            $this->withoutExceptionHandling();
            $query        = Query::factory()->create();
            $query_update = [
                'name'                   => 'Aakif',
                'mobile_number'          => '03320913427',
                'email'                  => 'abdul.iqra@gmail.com',
                'address'                => 'Passport Office',
                'dealt_by'               => '',
                'status'                 => 'Follow',
                'interaction_medium'     => 'Campus Visit',
                'additional_information' => ''
            ];
            $update_data  = [
                'id'   => $query->id,
                'data' => $query_update
            ];
            $view         = $this->put('/query/', $update_data);


            $query = Query::firstOrFail();
            $view->assertStatus(200);
            $this->assertEquals('Aakif', $query->name);
            $this->assertEquals('03320913427', $query->mobile_number);

        }

        /** @test */
        public function user_can_delete_a_query()
        {
            $query = Query::factory()->create();
            $view  = $this->delete('/query/'.$query->id,);
            $view->assertStatus(200);
            $this->assertEmpty(Query::first());
        }
    }
