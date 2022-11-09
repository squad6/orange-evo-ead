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

        return view('trail.module.index', ['modules' => $modules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Trail $trail)
    {
        return view('trail.module.create', ['trail' => $trail]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreModuleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModuleRequest $request, Trail $trail)
    {
        // As validações estão sendo feitas no StoreModuleRequest
        $module_stored = $trail->modules()->create(
            $request->all(),
            ['trail_id' => $trail->id],
        );

        return view('trail.module.create', ['trail' => $trail])->with('message', 'Módulo cadastrado com sucesso');
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

        return view('trail.module.show', ['module' => $module]);
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

        return view('trail.module.edit', ['module' => $module, 'trail' => $trail]);
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

        return view('trail.module.show', ['trail' => $trail, 'module'=> $module])->with('message', 'Módulo atualizado com sucesso!');
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
