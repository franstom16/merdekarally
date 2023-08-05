<?php

namespace App\Interfaces\Race;

interface ScoresRepositoryInterface
{
    public function getDataTable(array $filter);
    public function importData(array $data);
}
