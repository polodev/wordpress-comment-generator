<?php
namespace rttheme\comment_replicator;

use rttheme\comment_replicator\Libraries\CommentGenerator;
use rttheme\comment_replicator\Models\Comment;
use rttheme\comment_replicator\Models\Post;

require __dir__ . '/includes.php';

$posts = Post::onlyPost()->get('ID');
$comment_generator = new CommentGenerator();

var_dump($posts->toArray());

die;


foreach ($posts as $post) {
	echo $post->ID . " <br> ";
	foreach ($comments as $comment) {
		extract($comment);
		$comment_generator->add_comment($author, $author_email, $content, $post->ID );
	}
}


Comment::truncate();
Comment::insert( $comment_generator->get_comments() );

