<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\participant;
use App\Models\kendaraan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = participant::get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        participant::create($request->all());
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = participant::find($id);
        return response()->json($data);

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
    

     /**
     * Show the step One Form for creating a new participant.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepOne(Request $request)
    {
        $participant = $request->session()->get('participant');
  
        return view('participants.create-step-one',compact('participant'));
    }
  
    /**  
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepOne(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|unique:participants',
            'email' => 'required|email',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'hp' => 'required',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6'
        ]);
  
        if(empty($request->session()->get('participant'))){
            $participant = new participant();
            $participant->fill($validatedData);
            $request->session()->put('participant', $participant);
        }else{
            $participant = $request->session()->get('participant');
            $participant->fill($validatedData);
            $request->session()->put('participant', $participant);
        }
  
        return redirect()->route('participants.create.step.two');
    }
  
    /**
     * Show the step One Form for creating a new participant.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepTwo(Request $request)
    {
        $participant = $request->session()->get('participant');
  
        return view('participants.create-step-two',compact('participant'));
    }
  
    /**
     * Show the step One Form for creating a new participant.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepTwo(Request $request)
    {
        $validatedData = $request->validate([
            'kontak_darurat' => 'required',
            'gol_darah' => 'required',
            'riwayat_asma' => 'required',
            'riwayat_jantung' => 'required',
        ]);
  
        $participant = $request->session()->get('participant');
        $participant->fill($validatedData);
        $request->session()->put('participant', $participant);
  
        return redirect()->route('participants.create.step.three');
    }
  
    /**
     * Show the step One Form for creating a new participant.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepThree(Request $request)
    {
        $kendaraan = $request->session()->get('kendaraan');
  
        return view('participants.create-step-three',compact('kendaraan'));
    }
  
    /**
     * Show the step One Form for creating a new participant.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepThree(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'string',
            'model' => 'string',
            'nopol' => 'string',
            'cc' => 'string',
            'type' => 'string',
            
        ]);
  
        if(empty($request->session()->get('kendaraan'))){
            $kendaraan = new kendaraan();
            $kendaraan->fill($validatedData);
            $request->session()->put('kendaraan', $kendaraan);
        }else{
            $kendaraan = $request->session()->get('kendaraan');
            $kendaraan->fill($validatedData);
            $request->session()->put('kendaraan', $kendaraan);
        }

        return redirect()->route('participants.create.step.final');
    }
    
    /**
     * Show the step One Form for creating a new participant.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStepFinal(Request $request)
    {
        $participant = $request->session()->get('participant');
        $kendaraan = $request->session()->get('kendaraan');
  
        return view('participants.create-step-final',compact('participant'),compact('kendaraan'));
    }
  
    /**
     * Show the step One Form for creating a new participant.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreateStepFinal(Request $request)
    {
        $participant = $request->session()->get('participant');
        $kendaraan = $request->session()->get('kendaraan');
        $participant->password = Hash::make($participant->password);
        $participant->save();
        $kendaraan->participant_id = $participant->id;
        $kendaraan->save();
  
        $request->session()->forget('participant');
        $request->session()->forget('kendaraan');
  
        return redirect()->route('participants.create.step.one')->with('success','Akun anda telah di daftarkan');
    }
    
    public function login(Request $request)
    {
        /* if (! participant::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        } */
        if(!Auth::guard('participant')->attempt(['email' => $request->email, 'password' => 
        $request->password])){
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        };
        $user = participant::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login success',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

}
