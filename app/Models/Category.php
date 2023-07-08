<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory;
	public function topics()
	{
		return $this->hasManyThrough(Topic::class, TopicCategory::class, 'category_id', 'id', 'id', 'topic_id');
	}

	public function last_topic()
	{
		return $this->hasOneThrough(Topic::class, TopicCategory::class, 'category_id', 'id', 'id', 'topic_id')->latest();
	}
	
}
