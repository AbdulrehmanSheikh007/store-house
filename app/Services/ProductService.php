<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use Hashids;
use Storage;
use Arr;

class ProductService {

    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo) {
        $this->productRepo = $productRepo;
    }

    public function getAllProducts($filters = []) {
        return $this->productRepo->all($filters);
    }

    public function getProductById($id) {
        return $this->productRepo->find(Hashids::decode($id)[0]);
    }

    public function createProduct(array $data) {
        $data['created_by'] = auth()->user()->id;
        $categories = $data['categories'];
        if (!empty($data['image'])) {
            $image = $data['image'];
            $data['image'] = $image->store('products', 'public');
        }

        Arr::forget($data, ['id', '_method', '_token', 'action', 'categories']);
        $product = $this->productRepo->create($data);
        $product->categories()->attach($categories);
        return $product;
    }

    public function updateProduct($id, array $data) {
        $categories = $data['categories'];
        if (!empty($data['image'])) {
            $image = $data['image'];
            $data['image'] = $image->store('products', 'public');
        }

        Arr::forget($data, ['id', '_method', '_token', 'action', 'categories']);
        $this->productRepo->update(Hashids::decode($id)[0], $data);
        $product = $this->getProductById($id);
        $product->categories()->detach();
        $product->categories()->attach($categories);
        return $product;
    }

    public function deleteProduct($id) {
        $product = $this->getProductById($id);
        $product->categories()->detach();
        return $this->productRepo->delete(Hashids::decode($id)[0]);
    }

}
