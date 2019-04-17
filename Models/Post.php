<?php 
namespace rttheme\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{
  protected $guarded = [];
  protected $table = 'wp_posts';
}