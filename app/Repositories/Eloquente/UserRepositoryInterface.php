<?php

namespace App\Repositories;

class UserRepositoryInterface
{
    public function getAll(): array;
    public function findById(string $id): abject;
    public function create(array $data): object;
    public function update(string $id, array $data): object;
    public function delete(string $id): bool;
}
