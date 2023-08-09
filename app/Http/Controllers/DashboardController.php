<?php

namespace App\Http\Controllers;

use App\Models\Assessment\vAssessmentIndividualScore;
use App\Models\Assessment\vAssessmentTeamScore;
use App\Models\Race\RaceClass;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raceClass = RaceClass::get();
        return view('dashboard.content', ['raceClass' => $raceClass]);
    }

    public function ranking()
    {
        $rank       = [];
        $raceClass  = RaceClass::get();
        foreach ($raceClass as $rc)
        {
            $rank[$rc->class_name] = [
                'Individu'  => vAssessmentIndividualScore::where('class_code', $rc->class_code)->get(),
                'Team'      => vAssessmentTeamScore::where('class_code', $rc->class_code)->get()
            ];
        }
        dd($rank);
        return view('dashboard.ranking');
    }
}