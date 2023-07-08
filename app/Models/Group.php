<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	use HasFactory;
	protected $guarded = [];
	public function categories()
	{
		return $this->hasMany(Category::class, 'group_id', 'id');
	}
}
