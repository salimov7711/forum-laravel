<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	use HasFactory;
	protected $guarded = [];
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}

	public function posts()
	{
		return $this->hasMany(Post::class, 'topic_id')->whereNull('main_post');
	}
	public function last_post()
	{
		return $this->hasOne(Post::class, 'topic_id', 'id')->whereNull('main_post')->latest();
	}


}
