<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rank;

class RankController extends Controller
{
    public function index()
    {
        $roles = ['Employee', 'Trial', 'Staff', 'Executive', 'Management', 'Board of Directors', 'Council'];
        $ranks = [];
        foreach ($roles as $role) {
            $ranks[$role] = Rank::where('role', $role)->orderBy('rank')->get();
        }

        return view('ranks', compact('ranks'));
    }
}
