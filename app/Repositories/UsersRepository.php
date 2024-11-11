<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UsersRepositoryInterface;

class UsersRepository implements UsersRepositoryInterface {

    public function all($filters = []) {
        $data = User::withCount('products');
        $search = $filters["search"] ?? NULL;
        if (!empty($search)) {
            $data = $data->where('full_name', 'like', '%' . $search . '%');
            $data = $data->orWhere('email', 'like', '%' . $search . '%');
        }

        $data = $data->orderBy("ID", "DESC")->paginate(config("constants.PER_PAGE"));
        $data = $data->appends(['search' => $search]);
        return $data;
    }

    public function find($id) {
        return User::find($id);
    }

    public function create(array $data) {
        return User::create($data);
    }

    public function update($id, array $data) {
        $user = $this->find($id);
        $user->update($data);
        return $user;
    }

    public function delete($id) {
        $user = $this->find($id);
        $user->delete();
        return $user;
    }

}
