<?php

    namespace App\Http\Controllers;

    use App\Models\Course;
    use Illuminate\Http\Request;

    class CourseController extends Controller {

        public function show($id)
        {
            $course = Course::find($id);
            return view('dashboard.course.course_show')->with('course',$course);
        }

        public function store()
        {
            $course = Course::create([
                                         'title'                  => request('title'),
                                         'duration'               => request('duration'),
                                         'fee'                    => request('fee'),
                                         'additional_information' => request('additional_information')
                                     ]);
            return $course;
        }
        public function update()
        {
            $course = Course::findOrFail(request('course_id'));
            $course->fill(request('course'));
            $course->save();
        }
        public function delete($id){
            $course = Course::findOrFail($id);
            $course->delete();
            return $course;
        }


    }
