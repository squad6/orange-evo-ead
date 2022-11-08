<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContentRequest;
use App\Models\Content;
use App\Models\Module;
use App\Models\Trail;
use Illuminate\Http\Request;

class ContentController extends Controller
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
    public function index(Trail $trail, Module $module)
    {
        $contents = $module->contents()->get();

        return view('pages.trail.module.content.index', ['contents' => $contents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Trail $trail, Module $module)
    {
        return view('pages.trail.module.content.create', ['trail' => $trail, 'module' => $module]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Trail $trail, Module $module, StoreContentRequest $request)
    {
        // As validações estão sendo feitas no StoreContentRequest
        $content_stored = $module->contents()->create(
            $request->all(),
            ['module_id' => $module->id],
        );

        return view('pages.trail.module.content.create', ['trail' => $trail, 'module' => $module])->with('message', 'Conteúdo cadastrado com sucesso!');
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

        return view('pages.trail.module.content.show', ['content' => $content]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Trail $trail, Module $module, Content $content)
    {
        $content = $module->contents()->find($content)->first();

        return view('pages.trail.module.content.edit', ['trail' => $trail, 'content' => $content, 'module' => $module]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Trail $trail, Module $module, Content $content, Request $request)
    {
        $content = $module->contents()->find($content)->first();

        $content->update($request->all());

        return view('pages.trail.module.content.show', ['module' => $module, 'content'=> $content])->with('message', 'Conteúdo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trail $trail, Module $module, Content $content)
    {
        $content = $module->contents()->find($content)->first();

        $content->delete();

        return redirect()->route('content.index', ['trail' => $trail, 'module' => $module]);
    }
}
