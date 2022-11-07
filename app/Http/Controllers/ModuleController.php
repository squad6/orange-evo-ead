<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModuleRequest;
use App\Models\Module;
use App\Models\Trail;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Trail $trail)
    {
        $modules = $trail->modules()->get();

        return view('pages.trail.module.index', ['modules' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Trail $trail)
    {
        return view('pages.trail.module.create', ['trail' => $trail]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModuleRequest $request, Trail $trail)
    {
        // As validações estão sendo feitas no ModuleStoreRequest
        $store = $trail->modules()->create(
            $request->all(),
            ['trail_id' => $trail->id],
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Trail $trail, Module $module)
    {
        $module = $trail->modules()->find($module)->first();

        return view('pages.trail.module.show', ['module' => $module]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Trail $trail, Module $module)
    {
        $module = $trail->modules()->find($module)->first();

        return view('pages.trail.module.edit', ['module' => $module, 'trail' => $trail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Trail $trail, Module $module, Request $request)
    {
        $module = $trail->modules()->find($module)->first();

        $module->update($request->all());

        return view('pages.trail.module.show', ['trail' => $trail, 'module'=> $module])->with('message', 'Trilha cadastrada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trail $trail, Module $module)
    {
        $module = $trail->modules()->find($module)->first();

        $module->delete();

        return redirect()->route('module.index', ['trail' => $trail]);
    }
}
