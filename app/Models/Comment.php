<?php

namespace App\Models;

use App\Traits\Relationships\LikeRelationshipTrait;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use LikeRelationshipTrait;

    protected $fillable = ['body', 'user_id'];

    public function commentable() {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
