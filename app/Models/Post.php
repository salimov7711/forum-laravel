<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	use HasFactory;
	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function reply_to()
	{

		return $this->hasOne(Post::class, 'id', 'post_id');
	}

	public function likes()
	{
		return $this->hasMany(PostLike::class, 'post_id');
	}
}
