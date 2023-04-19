<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rank;
use App\Models\Training;
use Illuminate\Support\Facades\Auth;

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
        // don't show users who already have training
        foreach ($users as $user) {
            $training = Training::where('user_id', $user->id)->get();
            if ($training->isNotEmpty()) {
                $users = $users->except($user->id);
            }
        }

        return view('training.overview', compact('users'));
    }

    public function claimTraining($id)
    {
        $trainer = Auth::user()->id;  
        $user = $id;

        $training = new Training;
        $training->user_id = $user;
        $training->trainer_id = $trainer;
        $training->completed = 0;
        $training->save();

        $message = "Je hebt de training geclaimt!";
        return redirect()->route('trainings.claimed', ['id' => $training->user_id])->with('success', $message);
    }

    public function claimedTrainings()
    {
        $id = Auth::user()->id;
        $trainings = Training::where('trainer_id', $id)->get();
        if (!$trainings->isEmpty()) {
            foreach ($trainings as $training) {
                $user = User::where('id', $training->user_id)->first();
                $training->user = $user;
            }
        } else {
            $user = null;
        }
        $trainer = Auth::user();

        return view('training.claimed', compact('trainings', 'trainer', 'user'));
    }

    public function trainingSuccess($id)
    {
        $training = Training::where('user_id', $id)->first();
        $user = User::find($id);
        $user->rank_id = $user->rank_id + 1;
        $training->completed = 1;
        $training->delete();
        $user->save();

        $message = "Je hebt de leerling laten slagen!";
        return redirect()->route('trainings.overview')->with('success', $message);
    }

    public function trainingFail($id)
    {
        $training = Training::where('user_id', $id)->first();
        $training->delete();

        $message = "Je hebt de leerling laten zakken!";
        return redirect()->route('trainings.overview')->with('success', $message);
    }
}
