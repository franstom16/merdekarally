<?php

namespace App\Interfaces;

interface ParticipantRepositoryInterface
{
    public function getDataTable(array $filter);
    public function importData(array $data);
}
