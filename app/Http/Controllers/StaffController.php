<?php

    namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;

    class StaffController extends Controller {

        public function show($id)
        {
            $user = User::findOrFail($id);

            return view('dashboard.staff.staff_show', ['user' => $user]);
        }

        public function store()
        {
            $user = User::create([
                                     'name'     => request('name'),
                                     'email'    => request('email'),
                                     'password' => bcrypt(request('password'))
                                 ]);
            $user->save();

            return $user;
        }

        public function update()
        {
            $user = User::findOrFail(\request('user_id'));
            $user->fill(\request('user_update'));
            $user->save();
        }

        public function delete()
        {
            $user = User::findOrFail(request('user_id'));
            $user->delete();
        }
    }
