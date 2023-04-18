<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rank;

class TrainingController extends Controller
{
    public function index()
    {
        $idRanks = [];
        $restrictedRanks = array('Recruit V', 'Advisor V', 'High Security', 'Teamleader V');
        // make array of ranks id
        $ranks = Rank::whereIn('rank', $restrictedRanks)->get();
        $rankIds = $ranks->pluck('id')->all();
        $users = User::whereIn('rank_id', $rankIds)->orderBy('rank_id')->get();
        
        return view('training.overview', compact('users'));
    }
}
