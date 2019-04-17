<?php 
namespace rttheme\comment_replicator\Models;

use Illuminate\Database\Eloquent\Model;
use rttheme\comment_replicator\Settings;

class Comment extends Model{
  protected $guarded = [];
  protected $table = Settings::table_prefix . 'comments';
  public function post()
  {
  	return $this->belongsTo(Post::class, 'comment_post_ID');
  }
}