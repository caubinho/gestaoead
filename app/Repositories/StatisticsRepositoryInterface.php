<?php

namespace App\Repositories;

interface StatisticsRepositoryInterface
{
    public function getTotalUsers(): int;
    public function getTotalAdmins(): int;
    public function getTotalCursos(): int;
    public function getTotalSupports(): int;
}
