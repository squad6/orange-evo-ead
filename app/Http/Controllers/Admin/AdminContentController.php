<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContentRequest;
use App\Models\Content;
use App\Models\Module;
use App\Models\Trail;
use Illuminate\Http\Request;

class AdminContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Trail $trail, Module $module)
    {
        $contents = $module->contents()->get();

        return view('admin.trail.module.content.index', ['trail' => $trail, 'module' => $module, 'contents' => $contents]);
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

        $contents = $module->contents()->get();

        return view('admin.trail.module.content.index', ['trail' => $trail, 'module' => $module, 'contents' => $contents])->with('message', 'Conteúdo cadastrado com sucesso!');
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

        $contents = $module->contents()->get();

        return view('admin.trail.module.content.index', ['trail' => $trail, 'module' => $module, 'contents' => $contents])->with('message', 'Conteúdo atualizado com sucesso!');
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

        $contents = $module->contents()->get();

        return view('admin.trail.module.content.index', ['trail' => $trail, 'module' => $module, 'contents' => $contents])->with('message', 'Conteúdo excluído com sucesso!');
    }
}
