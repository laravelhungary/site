<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Question;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'github_id', 'github_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'github_token',
    ];

    /**
     * Egy a többhöz kapcsolat a felhasználó és a kérdések között.
     * @return [type] [description]
     */
    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function getAvatarAttribute() {
        return $this->attributes['avatar'];
    }
}
