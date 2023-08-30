<?php

namespace App\GraphQL\Mutations;

use App\Models\Post;

final class AttachTag
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $post = Post::find($args['post_id']);
        $post->tags()->attach($args['tag_id']);
        return $post;
    }
}
