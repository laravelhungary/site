<?php

namespace App\Traits\Relationships;

use App\Models\Like;

trait LikeRelationshipTrait {

    public function likes() {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function doLike() {
        $user_id = auth()->user()->id;
        if ($this->likes->contains('user_id', $user_id)) {
            $this->likes()->where('user_id', $user_id)->first()->delete();
            return true;
        }
        $this->likes()->create(['user_id' => $user_id]);
        return true;
    }
}
