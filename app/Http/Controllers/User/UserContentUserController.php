<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\ContentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserContentUserController extends Controller
{
    public function setStatusContent(Content $content, Request $request)
    {
        $user = Auth::user();

        $content_user = ContentUser::where('user_id', $user->id)
            ->where('content_id', $content->id);

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

        $trail_user = new UserTrailUserController;

        $trail_status_pecentage = $trail_user->setTrailUserStatus($trail, $request->content_status);

        return view('user.trail.module.show', ['trail' => $trail, 'module' => $content->module]);
    }
}
