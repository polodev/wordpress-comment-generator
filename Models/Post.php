<?php 
namespace rttheme\comment_replicator\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{
  protected $guarded = [];
  public $timestamps = false;
  protected $primaryKey = 'ID';

  public function getTable()
  {
    return getenv('TABLE_PREFIX') . 'posts';
  }

  public function comments()
  {
  	return $this->hasMany(Comment::class, 'comment_post_ID', 'ID');
  }

  public function scopeOnlyPost($query, $value = '')
  {
  	$query->where('post_type', 'post')->where('post_parent', 0);
  }
}