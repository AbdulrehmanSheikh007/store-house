<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Services\CategoryService;
use Hashids;
use Arr;

class CategoriesController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $categoryService;

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        $data = $this->categoryService->getAllCategories($request->all());
        return view('categories.list', compact(['data']));
    }

    public function create() {
        $action = 'Create';
        return view('categories.create', compact(['action']));
    }

    public function edit($id) {
        $action = 'Update';
        $data = $this->categoryService->getCategoryById($id);
        return view('categories.edit', compact(['action', 'data']));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $this->categoryService->createCategory($request->all());
        $request->session()->flash('success', 'Category has been created');
        return redirect("/categories");
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $this->categoryService->updateCategory($id, $request->all());
        $request->session()->flash('success', 'Category has been updated.');
        return redirect("/categories");
    }

    public function destroy($id, Request $request) {
        $this->categoryService->deleteCategory($id, $request->all());
        $request->session()->flash('success', 'Category has been deleted.');
        return redirect("/categories");
    }

}
