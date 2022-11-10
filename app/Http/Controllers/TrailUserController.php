<?php

namespace App\Http\Controllers;

use App\Models\Trail;
use App\Models\TrailUser;
use Illuminate\Support\Facades\Auth;

class TrailUserController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $trails = $user->trails;

        return view('user.dashboard', ['trails' => $trails]);
    }

    public function chooseTrail(Trail $trail)
    {
        $user = Auth::user();

        TrailUser::create([
            'user_id' => $user->id,
            'trail_id' => $trail->id,
        ]);

        return redirect()->route('user.dashboard');
    }

    public function setTrailUserStatus(Trail $trail, $content_status)
    {
        $user = Auth::user();

        $trail_user =  TrailUser::where('trail_id', $trail->id)
            ->where('user_id', $user->id);

        $trail_status = $trail_user->first()->trail_status;

        // Se $content_status == concluído
        if ($content_status == 1) {
            $trail_status = $trail_status + 1;

            $trail_user->update([
                'trail_status' => $trail_status,
            ]);
        }

        if ($trail_status > 0 && $content_status == 0) {
            $trail_status = $trail_status - 1;

            $trail_user->update([
                'trail_status' => $trail_status,
            ]);
        }

        // Transformando status em porcentagem (precisa ser melhor pensado)
        $number_of_trail_contents = 0;
        $number_of_finished_contents = 0;
        $user_trail_contents = [];

        foreach ($trail->modules as $module) {
            $number_of_trail_contents += $module->contents->count();

            foreach ($module->contents as $content) {
                array_push($user_trail_contents, $content->users->find($user->id));
            }
        }
        $user_trail_contents = array_filter($user_trail_contents);

        foreach ($user_trail_contents as $user_trail_content) {
            if ($user_trail_content->pivot->content_status == 1) {
                $number_of_finished_contents++;
            }
        }

        $trail_status_percentage = $number_of_finished_contents * 100 / $number_of_trail_contents;

        return redirect()->route('user.dashboard');
    }

    public function destroy(Trail $trail) {
        $user = Auth::user();

        $trail_user = TrailUser::where('user_id', $user->id)->where('trail_id', $trail->id);

        $trail_user->delete();

        return redirect()->route('user.dashboard')->with('message', 'Você se desinscreveu da trilha com sucesso!');
    }
}
