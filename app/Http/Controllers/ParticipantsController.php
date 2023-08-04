<?php

namespace App\Http\Controllers;

use App\Interfaces\ParticipantRepositoryInterface;
use App\Traits\Responses;
use Illuminate\Http\Request;

class ParticipantsController extends Controller
{
    use Responses;

    public $participantRepo;

    public function __construct(ParticipantRepositoryInterface $participantRepo)
    {
        $this->participantRepo = $participantRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('participants.list', ['page_act' => 'participants']);
    }

    public function getDataTable(Request $request)
    {
        return $this->participantRepo->getDataTable(['_token' => $request->_token]);
    }
}
