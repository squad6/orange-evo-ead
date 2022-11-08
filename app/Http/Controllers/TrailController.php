<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrailRequest;
use App\Models\Trail;
use Illuminate\Http\Request;

class TrailController extends Controller
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
    public function index()
    {
        $trails = Trail::all();

        return view('pages.trail.index', ['trails' => $trails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.trail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\StoreTrailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrailRequest $request)
    {
        // As validações estão sendo feitas no StoreFormRequest
        Trail::create($request->all());

        return view('pages.trail.create')->with('message', 'Trilha cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function show(Trail $trail)
    {
        return view('pages.trail.show', ['trail' => $trail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function edit(Trail $trail)
    {
        return view('pages.trail.edit', ['trail' => $trail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trail $trail)
    {
        $trail->update($request->all());

        return view('pages.trail.show', ['trail'=> $trail])->with('message', 'Trilha atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trail $trail)
    {
        $trail->delete();

        return redirect()->route('trail.index');
    }
}
