<?php

namespace App\Repositories;

use App\Models\Products;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface {

    public function all($filters = []) {
        $data = Products::with('creator');
        $search = $filters["search"] ?? NULL;
        if (!empty($search)) {
            $data = $data->where('name', 'like', '%' . $search . '%');
        }

        $data = $data->orderBy("updated_at", "DESC")->paginate(config("constants.PER_PAGE"));
        $data = $data->appends(['search' => $search]);
        return $data;
    }

    public function find($id) {
        return Products::with('categories')->find($id);
    }

    public function create(array $data) {
        return Products::create($data);
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
