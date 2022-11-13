<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function trails()
    {
        return $this->belongsToMany(Trail::class, 'trail_users')->withPivot(['trail_id','user_id','trail_status', 'trail_status_percentage']);
    }

    public function contents()
    {
        return $this->belongsToMany(Content::class, 'content_users')->withPivot(['content_id','user_id','content_status']);
    }

    public function getTrailUserStatusPercentage(Trail $trail): float|int
    {

        $trail_user =  TrailUser::where('trail_id', $trail->id)
            ->where('user_id', $this->id);

        return $trail_user->first()->trail_status_percentage;
    }

    public function getModuleStatusPercentage(Module $module): float|int
    {
        $number_of_trail_contents = $module->contents->count();
        if ($number_of_trail_contents == 0) {
            return 100;
        }
        $user_module_contents = [];
        foreach ($module->contents as $content) {
            array_push($user_module_contents, $content->users->find($this->id));
        }
        $user_module_contents = array_filter($user_module_contents);
        $number_of_finished_contents = 0;
        foreach ($user_module_contents as $user_trail_content) {
            if ($user_trail_content->pivot->content_status == 1) {
                $number_of_finished_contents++;
            }
        }
        return round(($number_of_finished_contents * 100) / $number_of_trail_contents);
    }
}
