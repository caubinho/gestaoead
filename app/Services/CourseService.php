<?php

namespace App\Services;

use App\Repositories\CourseRepositoryInterface;
use stdClass;

class CourseService
{
    private $repository;

    public function __construct(CourseRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(string $filter = ''): array
    {
        $data = $this->repository->getAll($filter);

       return convertItemsOfArrayToObject($data);
    }

    public function findById(string $id)
    {
        return $this->repository->findById($id);
    }

    public function create(array $data): object
    {
        return $this->repository->create($data);
    }

    public function update(string $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete(string $id): bool
    {
       return $this->repository->delete($id);
    }

}
