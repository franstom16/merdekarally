<?php

namespace App\Http\Controllers;

use App\Interfaces\AssessmentRepositoryInterface;
use App\Traits\Responses;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    use Responses;

    public $assessRepo;

    public function __construct(AssessmentRepositoryInterface $assessRepo)
    {
        $this->assessRepo = $assessRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('assessments.list', ['page_act' => 'assessments']);
    }

    public function champion($race)
    {
        return view('assessments.champion', ['team' => $this->assessRepo->getChampionTeamByRace($race), 'individual' => $this->assessRepo->getChampionIndividualByRace($race)]);
    }

    public function getDataTable(Request $request)
    {
        return $this->assessRepo->getDataTable(['_token' => $request->_token]);
    }

    public function getTeams(Request $request)
    {
        return $this->assessRepo->getTeams(['_token' => $request->_token]);
    }

    public function import()
    {
        return view('assessments.import', ['page_act' => 'assessments']);
    }

    public function importData(Request $request)
    {
        return $this->assessRepo->importData($request);
    }
}
