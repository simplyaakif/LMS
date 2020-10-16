<?php

    namespace App\Http\Controllers;

    use App\Models\Student;
    use Illuminate\Http\Request;

    class StudentController extends Controller {

        public function show($id)
        {
            $student = Student::find($id);
            return view('dashboard.student.student_show', ['student' => $student]);
        }
        //
    }
