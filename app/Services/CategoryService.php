<?php

namespace App\Services;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Hashids;
use Arr;

class CategoryService {

    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo) {
        $this->categoryRepo = $categoryRepo;
    }

    public function getAllCategories($filters = []) {
        return $this->categoryRepo->all($filters);
    }

    public function getCategoryById($id) {
        return $this->categoryRepo->find(Hashids::decode($id)[0]);
    }

    public function createCategory(array $data) {
        Arr::forget($data, ['id', '_method', '_token', 'action']);
        return $this->categoryRepo->create($data);
    }

    public function updateCategory($id, array $data) {
        Arr::forget($data, ['id', '_method', '_token', 'action']);
        return $this->categoryRepo->update(Hashids::decode($id)[0], $data);
    }

    public function deleteCategory($id) {
        return $this->categoryRepo->delete(Hashids::decode($id)[0]);
    }

}
