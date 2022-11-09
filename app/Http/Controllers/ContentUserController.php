<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentUserController extends Controller
{
    public function checkContent(Content $content)
    {
        $user = Auth::user();

        ContentUser::create([
            'user_id' => $user->id,
            'content_id' => $content->id,
            'content_check' => true,
        ]);

        return view('content-show', ['content' => $content]);
    }
}
