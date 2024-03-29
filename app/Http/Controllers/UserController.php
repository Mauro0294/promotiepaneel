<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Warning;
use App\Models\Rank;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('rank_id')->get();
        return view('users', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $nextRank = Rank::where('id', $user->rank_id + 1)->get();
        if ($nextRank->isNotEmpty()) {
            $nextRank = $nextRank[0];
        } else {
            // Handle the case where no results were found, e.g. set $nextRank to null or throw an exception
            $nextRank = null;
        }

        $warnings = Warning::where('user_id', $id)->get();
        return view('user', compact('user', 'warnings', 'nextRank'));
    }

    public function promote($id, Request $request)
    {
        $user = User::find($id);
        if ($user->id == Auth::id()) {
            $message = "Je kunt jezelf geen promotie geven!";
            return redirect()->route('user', ['id' => $id])->with('danger', $message);
        }

        $restrictedRanks = array('Recruit V' => 'gate training krijgen', 'Advisor V' => 'gate training krijgen', 'High Security' => 'promotie training krijgen', 'Teamleader V' => 'getraint worden om andere leden te trainen');
        foreach ($restrictedRanks as $rank => $type) {
            if ($user->rank->rank == $rank) {
                $message = $user->username . " moet eerst " . $type . "";
                return redirect()->route('user', ['id' => $id])->with('danger', $message);
            }
        }
        $user->rank_id += 1;
        $user->save();
        $message = "Je hebt " . $user->username . " gepromoveerd!";
        return redirect()->route('user', ['id' => $id])->with('success', $message);
    }

    public function demote($id)
    {
        $user = User::find($id);
        if ($user->id == Auth::id()) {
            $message = "Je kunt jezelf niet degraderen!";
            return redirect()->route('user', ['id' => $id])->with('danger', $message);
        }
    
        $user->rank_id -= 1;
        $user->save();
        $message = "Je hebt " . $user->username . " gedegradeerd!";
        return redirect()->route('user', ['id' => $id])->with('success', $message);
    }
}
