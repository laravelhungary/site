<?php

namespace App\Traits\Relationships;
use App\Models\Comment;

/**
 * trait CommentRelationshipTrait
 *
 * @package \app\Traits\Relationships
 */
trait CommentRelationshipTrait
{
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
