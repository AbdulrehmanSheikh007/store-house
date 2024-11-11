<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface UsersRepositoryInterface {

    public function all(array $data);

    public function find($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}
