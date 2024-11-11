<?php

namespace App\Services;

use App\Repositories\Interfaces\UsersRepositoryInterface;
use Hashids;
use Arr;

class UserService {

    protected $usersRepo;

    public function __construct(UsersRepositoryInterface $usersRepo) {
        $this->usersRepo = $usersRepo;
    }

    public function getAllUsers($filters = []) {
        return $this->usersRepo->all($filters);
    }

    public function getUserById($id) {
        return $this->usersRepo->find(Hashids::decode($id)[0]);
    }

    public function createUser(array $data) {
        Arr::forget($data, ['id', '_method', '_token', 'action', 'password_confirmation']);
        $data['password'] = \Hash::make($data['password']);
        return $this->usersRepo->create($data);
    }

    public function updateUser($id, array $data) {
        Arr::forget($data, ['id', '_method', '_token', 'action']);
        return $this->usersRepo->update(Hashids::decode($id)[0], $data);
    }

    public function deleteUser($id) {
        return $this->usersRepo->delete(Hashids::decode($id)[0]);
    }

}
