<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\result;
use App\Models\timelimit;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = result::orderBy('total_tempuh','desc')->get();
        return response()->json([
            'data'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        function hitunglimit($mins,$limit)
        {
            $diff = $mins ? $mins - $limit->limit : -100;
            
            if ($diff >= 0 && $diff< 5 ) {
                return 100;
            } else if($diff >= 5 && $diff < 10 ) {
                return 98;
            } else if($diff >= 10 && $diff < 15 ) {
                return 90;
            } else if($diff >= 15 && $diff < 20 ) {
                return 85;
            } else if($diff >= 20 && $diff < 25 ) {
                return 80;
            }else if($diff >= 25 && $diff < 30 ) {
                return 70;
            }else if($diff >= 30 && $diff < 45 ) {
                return 60;
            }else if($diff >= 45 && $diff < 60 ) {
                return 50;
            }else if($diff >= 60 ) {
                return 30;
            }else  {
                return 0;
            }
            
        }
        $res = [];
        $res = result::where('team',$request->team)->where('nama_lengkap',$request->name)->first();
        switch ($request->pos) {
            case 0:
                $res['start_time'] = $request->time;
                break;
            case 1:
                $res['time_pos1'] = $request->time;
                break;
            case 2:
                $res['time_pos2'] = $request->time;
                break;
            case 3:
                $res['time_pos3'] = $request->time;
                break;
            case 4:
                $res['time_finish'] = $request->time;
            
                break;
            default :
                break;
        }
        $mins1 = null;
        $score1 = null;

        $mins2 = null;
        $score2 = null;

        $mins3 = null;
        $score3 = null;

        $minsFinish = null;
        $scoreFinish = null;

        $totalMins = null;
        $totalScore = null;

        $mins1 =  $res && isset($res->start_time) ? (strtotime($res->time_pos1) - strtotime($res->start_time)) / 60 : null;
        $limit = timelimit::where('pos','1')->first();
        $score1 = hitunglimit($mins1,$limit);
        
        $mins2 =  $res && isset($res->time_pos1) ? (strtotime($res->time_pos2) - strtotime($res->time_pos1)) / 60 : null;
        $limit = timelimit::where('pos','2')->first();
        $score2 = hitunglimit($mins2,$limit);
        
        $mins3 =  $res && isset($res->time_pos2) ? (strtotime($res->time_pos3) - strtotime($res->time_pos2)) / 60 : null;
        $limit = timelimit::where('pos','3')->first();
        $score3 = hitunglimit($mins3,$limit);
        
        $minsFinish =  $res && isset($res->time_pos3) ? (strtotime($res->time_finish) - strtotime($res->time_pos3)) / 60 : null;
        $limit = timelimit::where('pos','4')->first();
        $scorefinish = hitunglimit($minsFinish,$limit);
        $mins1 =  $mins1 >= 0 ? $mins1 : 0;
        $mins2 =  $mins2 >= 0 ? $mins2 : 0;
        $mins3 =  $mins3 >= 0 ? $mins3 : 0;
        $minsFinish =  $minsFinish >= 0 ? $minsFinish : 0;
        $totalMins = $mins1 +  $mins2 + $mins3 +  $minsFinish ;
        $totalScore = $score1 + $score2 + $score3 + $scoreFinish;
            $res = result::updateOrCreate(
                ['team' => $request->team, 'nama_lengkap' => $request->name],
                [
                'start_time' =>  $res['start_time']?? null,
                'time_pos1' =>  $res['time_pos1']?? null,
                'time_pos2' =>  $res['time_pos2']?? null,
                'time_pos3' =>  $res['time_pos3']?? null,
                'time_finish' =>  $res['time_finish']?? null,
                'tempuh_pos1'=> $mins1,
                'tempuh_pos2'=> $mins2,
                'tempuh_pos3'=> $mins3,
                'tempuh_finish'=> $minsFinish,
                'scorepos1'=> $score1,
                'scorepos2'=> $score2,
                'scorepos3'=> $score3,
                'scorefinish'=> $scorefinish,
                'total_tempuh'=>$totalMins,
                'scoretotal'=>$totalScore
            ]
        );
        return response()->json($res);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $res = result::find($id);
        return response()->json($res);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
