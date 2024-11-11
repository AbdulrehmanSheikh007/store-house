<?php

namespace App\Repositories\Interfaces;

use App\Models\Categories;

interface CategoryRepositoryInterface {

    public function all(array $data);

    public function find($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}
