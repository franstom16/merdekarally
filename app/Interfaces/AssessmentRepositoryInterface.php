<?php

namespace App\Interfaces;

interface AssessmentRepositoryInterface
{
    public function getChampionIndividualByRace($race);
    public function getChampionTeamByRace($race);
    public function getDataTable(array $filter);
    public function getTeams(array $filter);
    public function importData(array $data);
}
