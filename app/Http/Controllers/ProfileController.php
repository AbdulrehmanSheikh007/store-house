<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Storage;
use Arr;
use Hash;
use Hashids;

class ProfileController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $data = auth()->user();
        return view('profile.profile', compact(['data']));
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'full_name' => 'required',
            'email' => [
                'required',
                'email',
                'unique:users,email,' . Auth::id(),
            ]
        ]);
        
        $modalValues = $request->all();
        Arr::forget($modalValues, ['id', '_method', '_token', 'action']);        
        User::where("id", Hashids::decode($id))->update($modalValues);

        $request->session()->flash('success', 'Profile has been updated');
        return redirect("/profile");
    }

    public function changePassword() {
        return view('profile.change-password');
    }

    public function updatePassword(Request $request) {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password'
        ]);

        if (!Hash::check($request['current_password'], auth()->user()->password)) {
            //Password didn't matched 
            $request->session()->flash('error', 'Current password is incorrect.');
            return redirect("/change-password");
        }

        User::where("id", auth()->user()->id)->update(["password" => Hash::make($request['password'])]);

        $request->session()->flash('success', 'Password has been updated.');
        return redirect("/change-password");
    }

}
