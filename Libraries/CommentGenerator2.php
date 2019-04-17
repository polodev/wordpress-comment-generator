<?php 

namespace rttheme\comment_replicator\Libraries;

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

  public $last_parent_comment_id = null;

  public function add_comment($author, $email, $content, $post_id)
  {
    $comment = [
      'comment_post_ID'      => $post_id,
      'comment_author'       => $author,
      'comment_author_email' => $email,
      'comment_content'      => $content,
      'comment_parent'       => $this->comment_parent,
      'comment_date'         => $this->comment_date,
      'comment_date_gmt'     => $this->comment_date_gmt,
      'comment_agent'        => $this->comment_agent,
      'comment_parent'       => $this->comment_parent,
      'user_id'              => $this->user_id,
    ];
    $this->comments[] = $comment;
    return $this;
  }
  public function get_comments()
  {
  	return $this->comments;
  }
}
