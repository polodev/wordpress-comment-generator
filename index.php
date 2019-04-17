<?php
namespace rttheme\comment_replicator;

use rttheme\comment_replicator\Libraries\CommentGenerator;
use rttheme\comment_replicator\Models\Comment;
use rttheme\comment_replicator\Models\Post;

require __dir__ . '/includes.php';


$posts = Post::onlyPost()->get('ID');
$comment_generator = new CommentGenerator();


Comment::truncate();
foreach ($posts as $post) {
	foreach ($comments as $comment) {
		$comment_generator->add_comment($comment, $post->ID );
	}
}


$posts = Post::onlyPost()->get();
foreach ($posts as $post) {
	$post->comment_count = $post->comments->count();
	$post->save();
}
