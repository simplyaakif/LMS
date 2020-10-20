<?php

    namespace App\Http\Controllers;

    use App\Models\Employee;
    use App\Models\User;
    use Illuminate\Http\Request;

    class EmployeeController extends Controller {

        public function show($id)
        {
            $employee_member = Employee::findOrFail($id);
            return view('dashboard.employee.employee_show', ['employee_member' => $employee_member]);
        }

        public function store()
        {
            $member = Employee::create(request('member'));
            $member->save();
            return $member;
        }

        public function update()
        {
            $employee = Employee::findOrFail(\request('id'));
            $employee->fill(\request('update_member'));
            $employee->save();
            return $employee;
        }

        public function delete()
        {
            $employee = Employee::findOrFail(request('id'));
            $employee->delete();
        }


        // User Methods
        public function show_user($id)
        {
            $user = User::findOrFail($id);
            return $user;
        }

        public function store_user()
        {
            $employee = Employee::findOrFail(request('employee_id'));
            $employee->user()->create(\request('user'));
            return $employee->user;
        }

        public function update_user()
        {
            $employee = Employee::findOrFail(request('employee_id'));
            $employee->user()->update(request('user_update'));
            return $employee->user;
        }

        public function delete_user()
        {
            $employee = Employee::findOrFail(request('employee_id'));
            $employee->user()->delete();

        }
    }
