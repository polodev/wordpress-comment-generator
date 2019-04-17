<?php 
namespace rttheme\comment_replicator\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
  protected $guarded = [];
  public $timestamps = false;
  protected $primaryKey = 'comment_ID';
  public function post()
  {
  	return $this->belongsTo(Post::class, 'comment_post_ID');
  }
  public function getTable()
  {
    return getenv('TABLE_PREFIX') . 'comments';
  }
}