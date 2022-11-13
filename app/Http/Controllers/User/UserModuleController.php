<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Trail;

class UserModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Trail $trail)
    {
        $modules = $trail->modules()->get();

        return view('user.trail.module.index', ['trail' => $trail, 'modules' => $modules]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Trail $trail, Module $module)
    {
        return view('user.trail.module.show', ['trail' => $trail, 'module' => $module]);
    }
}
