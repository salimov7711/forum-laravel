<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$groups = Group::get();
		return $groups;
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $url)
	{


		$group = Group::where('url', $url)->first();
		// $categories = Category::where('group_id', $group->id)
		// 	->withCount('topics')
		// 	->with('last_topic')

		// 	->get();
		$categories = Category
			::leftJoin('topic_categories', 'categories.id', 'topic_categories.category_id')
			->leftJoin('posts', 'topic_categories.topic_id', 'posts.topic_id')
			->select('categories.*', DB::raw('count(posts.id) as posts_qty'))
			->where('group_id', $group->id)
			->withCount('topics')
			->with('last_topic.user')
			->groupBy(
				'categories.id',
				'categories.title',
				'categories.desc',
				'categories.group_id',
				'categories.url',
				'categories.created_at',
				'categories.updated_at'
			)
			->get();

		return  response()->json(['group' => $group, 'categories' => $categories]);
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		//
	}
}
