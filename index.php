<?php
namespace rttheme\comment_replicator;

use rttheme\comment_replicator\Libraries\CommentGenerator;
use rttheme\comment_replicator\Models\Comment;
use rttheme\comment_replicator\Models\Post;

require __dir__ . '/includes.php';


$posts = Post::onlyPost()->get('ID');
$comment_generator = new CommentGenerator();


foreach ($posts as $post) {
	foreach ($comments as $comment) {
		extract($comment);
		$comment_generator->add_comment($author, $author_email, $content, $post->ID );
	}
}


// generating comment 
// Comment::truncate();
// Comment::insert( $comment_generator->get_comments() );


$posts = Post::onlyPost()->get();
foreach ($posts as $post) {
	$post->comment_count = $post->comments->count();
	$post->save();
}

// $post = Post::find(3249);
// $post->comment_count = 10;
// $post->save();
// echo json_encode($post->comment_count);

// $comments = Comment::all();
// var_dump($comments->first()->post->ID);

