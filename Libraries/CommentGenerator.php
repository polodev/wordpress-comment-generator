<?php 

namespace rttheme\comment_replicator\Libraries;

use rttheme\comment_replicator\Models\Comment;

class CommentGenerator {
  public $comment_ID;
  public $comment_post_ID;
  public $comment_author;
  public $comment_author_email;
  public $comment_author_url;
  public $comment_author_IP="103.55.146.133" ;
  public $comment_date = "2019-04-17 06:51:10";
  public $comment_date_gmt = "2019-04-17 06:51:10" ;
  public $comment_content;
  public $comment_karma ;
  public $comment_approved = 1;
  public $comment_agent = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.103 Safari/537.36";
  public $comment_type;
  public $comment_parent = 0;
  public $user_id = 0;


  public $comments = [];
  public $last_parent_id = null;


  public function is_parent($comment)
  {
    return  isset( $comment['child_comments']  ) && $comment['child_comments'];
  }
  public function is_child($comment)
  {
    if ($this->is_parent($comment)) {
      return false;
    }
    if ( ! isset($comment['child_comments']) ) {
      return true;
    }
    return false;
  }

  public function add_comment($comment, $post_id, $has_parent = false)
  {
    $comment_args = [
      'comment_post_ID'      => $post_id,
      'comment_author'       => $comment['author'],
      'comment_author_email' => $comment['author_email'],
      'comment_content'      => $comment['content'],
      'comment_parent'       => $this->comment_parent,
      'comment_date'         => $this->comment_date,
      'comment_date_gmt'     => $this->comment_date_gmt,
      'comment_agent'        => $this->comment_agent,
      'comment_parent'       => $this->comment_parent,
      'user_id'              => $this->user_id,
    ];
    if ($has_parent && $this->last_parent_id) {
      $comment_args['comment_parent'] = $this->last_parent_id;
    }
    $new_comment = Comment::create($comment_args);
    if ($this->is_parent($comment)) {
      $this->last_parent_id = $new_comment->comment_ID;
      $this->generate_child_comment($comment, $post_id);
    }
    return $this;
  }

  public function generate_child_comment($comment, $post_id)
  {
    if (isset($comment['child_comments'])) {
      foreach ($comment['child_comments'] as $child_comment) {
        $this->add_comment($child_comment, $post_id, true );
      }
    }
  }




  public function get_comments()
  {
  	return $this->comments;
  }
}
