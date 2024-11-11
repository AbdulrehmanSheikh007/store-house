<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Hashids; 
use Arr;

class CategoriesController extends Controller {

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
    public function index(Request $request) {
        $filters = $request->all();
        $data = Categories::query();
        $search = $filters["search"] ?? NULL; 
        if (!empty($search)) {
            $data = $data->where('name', 'like', '%' . $search . '%');
        }

        $data = $data->orderBy("ID", "DESC")->paginate(config("constants.PER_PAGE"));
        $data = $data->appends(['search' => $search]);
        return view('categories.list', compact(['data']));
    }

    public function create() {
        $action = 'Create';
        return view('categories.create', compact(['action']));
    }

    public function edit($id) {
        $action = 'Update';
        $data = Categories::where("id", Hashids::decode($id))->first();
        return view('categories.edit', compact(['action', 'data']));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $modalValues = $request->all();
        Arr::forget($modalValues, ['id', '_method', '_token', 'action']);
        Categories::create($modalValues);

        $request->session()->flash('success', 'Category has been created');
        return redirect("/categories");
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $modalValues = $request->all();
        Arr::forget($modalValues, ['id', '_method', '_token', 'action']);
        Categories::where("id", Hashids::decode($id))->update($modalValues);

        $request->session()->flash('success', 'Category has been updated.');
        return redirect("/categories");
    }

    public function destroy($id, Request $request) {
        Categories::where("id", Hashids::decode($id))->delete();
        $request->session()->flash('success', 'Category has been deleted.');
        return redirect("/categories");
    }

}
