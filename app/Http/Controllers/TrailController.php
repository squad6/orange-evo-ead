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

        return view('pages.trail.create')->with('message', 'Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function show(Trail $trail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function edit(Trail $trail)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trail  $trail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trail $trail)
    {
        //
    }
}
