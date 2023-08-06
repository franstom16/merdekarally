<?php

namespace App\Interfaces\Race;

interface ScoresRepositoryInterface
{
    public function createData(array $data);
    public function deleteData($id);
    public function getDataTable(array $filter);
    public function getRaceClass();
    public function importData(array $data);
    public function updateData(array $data, $id);
}
