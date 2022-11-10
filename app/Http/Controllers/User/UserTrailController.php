<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Trail;

class UserTrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trails = Trail::all();

        return view('user.trail.index', ['trails' => $trails]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function show(Trail $trail)
    {
        return view('user.trail.show', ['trail' => $trail]);
    }
}
