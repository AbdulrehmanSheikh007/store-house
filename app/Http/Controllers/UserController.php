<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Hashids;
use Arr;

class UserController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        $data = $this->userService->getAllUsers($request->all());
        return view('users.list', compact(['data']));
    }

    public function create() {
        $action = 'Create';
        return view('users.create', compact(['action']));
    }

    public function edit($id) {
        $action = 'Update';
        $data = $this->userService->getUserById($id);
        return view('users.edit', compact(['action', 'data']));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'full_name' => 'required',
            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],
            'password' => 'required|string|min:6|max:20|confirmed'
        ]);

        $this->userService->createUser($request->all());
        $request->session()->flash('success', 'User has been created');
        return redirect("/users");
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'full_name' => 'required',
            'email' => [
                'required',
                'email',
                'unique:users,email,' . Hashids::decode($id)[0],
            ]
        ]);

        $this->userService->updateUser($id, $request->all());
        $request->session()->flash('success', 'User has been updated.');
        return redirect("/users");
    }

    public function destroy($id, Request $request) {
        $this->userService->deleteUser($id, $request->all());
        $request->session()->flash('success', 'User has been deleted.');
        return redirect("/users");
    }

}
