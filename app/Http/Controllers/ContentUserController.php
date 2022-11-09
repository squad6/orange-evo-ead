<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentUser;
use App\Models\TrailUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentUserController extends Controller
{
    public function setStatusContent(Content $content, Request $request)
    {
        $user = Auth::user();

        // dd($request->content_status);

        $content_user = ContentUser::where('user_id', $user->id)
            ->where('content_id', $content->id);

        // dd($content_user);

        if ($content_user->first() !== null) {
            $content_user->update([
                'content_status' => $request->content_status,
            ]);
        } else {
            $content_user = ContentUser::create([
                'user_id' => $user->id,
                'content_id' => $content->id,
                'content_status' => $request->content_status,
            ]);
        }

        // Atualizar status da trilha
        $trail = $content->module->trail;

        $trail_user = new TrailUserController;

        return $trail_user->setTrailUserStatus($trail, $request->content_status);


        // dd($content_user);

        return redirect()->route('content.show', ['trail' => $content->module->trail->id, 'module' => $content->module->id, 'content' => $content]);
    }
}
