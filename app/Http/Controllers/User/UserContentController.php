<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Module;
use App\Models\Trail;

class UserContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Trail $trail, Module $module)
    {
        $contents = $module->contents()->get();

        return view('user.trail.module.content.index', ['contents' => $contents]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Trail $trail, Module $module, Content $content)
    {
        $content = $module->contents()->find($content)->first();

        return view('user.trail.module.content.show', ['content' => $content]);
    }
}
