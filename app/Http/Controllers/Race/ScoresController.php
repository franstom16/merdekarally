<?php

namespace App\Http\Controllers\Race;

use App\Http\Controllers\Controller;
use App\Interfaces\Race\ScoresRepositoryInterface;
use App\Traits\Responses;
use Illuminate\Http\Request;

class ScoresController extends Controller
{
    use Responses;

    public $scoresRepo;

    public function __construct(ScoresRepositoryInterface $scoresRepo)
    {
        $this->scoresRepo = $scoresRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('race.scores.list', ['page_act' => 'race/scores']);
    }

    public function getDataTable(Request $request)
    {
        return $this->scoresRepo->getDataTable(['_token' => $request->_token]);
    }

    public function import()
    {
        return view('race.scores.import', ['page_act' => 'race/scores']);
    }

    public function importData(Request $request)
    {
        return $this->scoresRepo->importData($request);
    }
}
