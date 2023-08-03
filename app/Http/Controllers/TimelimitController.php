<?php

namespace App\Http\Controllers;

use App\Models\timelimit;
use App\Models\result;
use Illuminate\Http\Request;

class TimelimitController extends Controller
{
    //
    public function store(Request $request)
    {
        
        timelimit::updateOrCreate(
            ['pos' => $request->pos],
            ['limit' => $request->limit,]
        );
        return 'Sukses';

    }
    
    //
    public function show(Request $request)
    {
        
        $individu = result::where('team','Individu')->orderBy('scoretotal','desc')->get();
        $teams = result::where('team','<>','Individu')->where('team','<>','Spectator')->orderBy('scoretotal','desc')->get();
        $spectators = result::where('team','Spectator')->orderBy('scoretotal','desc')->get();
        return view('participants',['individu'=>$individu,'teams'=>$teams,'spectators'=>$spectators]);

    }
}
