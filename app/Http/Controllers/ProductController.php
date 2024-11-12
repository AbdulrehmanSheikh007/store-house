<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryService;
use Arr;

class ProductController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $productService;
    protected $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService) {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        $data = $this->productService->getAllProducts($request->all());
        return view('products.list', compact(['data']));
    }

    public function create() {
        $action = 'Create';
        $categories = $this->categoryService->getAllCategories(['paginate' => false]);
        return view('products.create', compact(['action', 'categories']));
    }

    public function edit($id) {
        $action = 'Update';
        $categories = $this->categoryService->getAllCategories(['paginate' => false]);
        $data = $this->productService->getProductById($id);
        $categoryIds = $data->categories->pluck("id")->toArray();
        return view('products.edit', compact(['action', 'data', 'categories', 'categoryIds']));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'quantity' => 'required|numeric|min:1',
            'price' => 'sometimes|numeric'
        ]);

        $this->productService->createProduct($request->all());
        $request->session()->flash('success', 'Product has been created');
        return redirect("/products");
    }

    public function update($id, Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'quantity' => 'required|numeric|min:1',
            'price' => 'sometimes|numeric'
        ]);

        $this->productService->updateProduct($id, $request->all());
        $request->session()->flash('success', 'Product has been updated.');
        return redirect("/products");
    }

    public function destroy($id, Request $request) {
        $this->productService->deleteProduct($id, $request->all());
        $request->session()->flash('success', 'Product has been deleted.');
        return redirect("/products");
    }

}
