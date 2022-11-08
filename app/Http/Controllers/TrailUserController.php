<?php

namespace App\Http\Controllers;

use App\Models\Trail;
use App\Models\TrailUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrailUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $trails = $user->trails;

        return view('user.trail.my-trails', ['trails' => $trails]);
    }

    public function chooseTrail(Trail $trail)
    {
        $user = Auth::user();

        TrailUser::create([
            'user_id' => $user->id,
            'trail_id' => $trail->id,
        ]);

        return redirect()->route('my.trails');
    }
}
