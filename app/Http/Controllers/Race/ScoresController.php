<?php

namespace App\Http\Controllers\Race;

use App\Http\Controllers\Controller;
use App\Interfaces\Race\ScoresRepositoryInterface;
use App\Models\Race\Score;
use App\Traits\Responses;
use Illuminate\Http\Request;

class ScoresController extends Controller
{
    use Responses;

    public $scoreRepo;

    public function __construct(ScoresRepositoryInterface $scoreRepo)
    {
        $this->scoreRepo = $scoreRepo;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('race.scores.form', ['page_act' => 'race/scores', 'raceClass' => $this->scoreRepo->getRaceClass()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->responseJson('Delete Score', $this->scoreRepo->deletData($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        return view('race.scores.form', ['page_act' => 'race/scores', 'score' => $score, 'raceClass' => $this->scoreRepo->getRaceClass()]);
    }

    public function getDataTable(Request $request)
    {
        return $this->scoreRepo->getDataTable(['_token' => $request->_token]);
    }

    public function import()
    {
        return view('race.scores.import', ['page_act' => 'race/scores']);
    }

    public function importData(Request $request)
    {
        return $this->scoreRepo->importData($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->responseJson('Create Score', $this->scoreRepo->createData($request));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->responseJson('Update Score', $this->scoreRepo->updateData($request, $id));
    }
}
