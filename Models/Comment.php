<?php 
namespace rttheme\comment_replicator\Models;

use Illuminate\Database\Eloquent\Model;
use rttheme\comment_replicator\Settings;

class Comment extends Model{
  protected $guarded = [];
  public $timestamps = false;
  protected $table ='comments';
  public function __construct()
  {
  	$this->table = getenv('TABLE_PREFIX') . 'comments';
  }
  protected $primaryKey = 'comment_ID';
  public function post()
  {
  	return $this->belongsTo(Post::class, 'comment_post_ID');
  }
}