<?php

namespace App\Repositories;

use App\Models\Categories;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {

    public function all($filters = []) {
        $data = Categories::withCount('products');
        $search = $filters["search"] ?? NULL;
        if (!empty($search)) {
            $data = $data->where('name', 'like', '%' . $search . '%');
        }

        $data = $data->orderBy("ID", "DESC")->paginate(config("constants.PER_PAGE"));
        $data = $data->appends(['search' => $search]);
        return $data;
    }

    public function find($id) {
        return Categories::find($id);
    }

    public function create(array $data) {
        return Categories::create($data);
    }

    public function update($id, array $data) {
        $category = $this->find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id) {
        $category = $this->find($id);
        $category->delete();
        return $category;
    }

}
