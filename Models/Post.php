<?php 
namespace rttheme\comment_replicator\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{
  protected $guarded = [];
  protected $table = 'wp_posts';

  public function comments()
  {
  	return $this->hasMany(Commnet::class, 'comment_post_ID');
  }

  public function scopeOnlyPost($query, $value = '')
  {
  	$query->where('post_type', 'post')->where('post_parent', 0);
  }
}