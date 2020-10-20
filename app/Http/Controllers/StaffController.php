<?php

    namespace App\Http\Controllers;

    use App\Models\Staff;
    use App\Models\User;
    use Illuminate\Http\Request;

    class StaffController extends Controller {

        public function show($id)
        {
            $staff_member = Staff::findOrFail($id);
            return view('dashboard.staff.staff_show', ['staff_member' => $staff_member]);
        }

        public function store()
        {
            $member = Staff::create(request('member'));
            $member->save();
            return $member;
        }

        public function update()
        {
            $staff = Staff::findOrFail(\request('id'));
            $staff->fill(\request('update_member'));
            $staff->save();
            return $staff;
        }

        public function delete()
        {
            $staff = Staff::findOrFail(request('id'));
            $staff->delete();
        }


        // User Methods
        public function show_user($id)
        {
            $user = User::findOrFail($id);
            return $user;
        }

        public function store_user()
        {
            $user = User::create(request('user'));
            $user->save();
            return $user;
        }

        public function update_user()
        {
            $user = User::findOrFail(\request('user_id'));
            $user->fill(\request('user_update'));
            $user->save();
            return $user;
        }

        public function delete_user()
        {
            $user = User::findOrFail(request('user_id'));
            $user->delete();
        }
    }
