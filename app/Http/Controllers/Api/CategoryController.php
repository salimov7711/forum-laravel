<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Group;
use App\Models\Topic;
use App\Models\TopicCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(string $url)
	{
		// $categories = Group::where('url', $url)->first()->categories;
		// $group = Group::where('url', $url)->first();
		// return  response()->json(['group' => $group, 'categories' => $categories]);
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create(string $url)
	{
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

	public function show(string  $categoryUrl)
	{
		$category = Category::where('url', $categoryUrl)->first();

		$topicsIds = TopicCategory::where('category_id', $category->id)->pluck('topic_id');

		$topics = Topic::whereIntegerInRaw('id', $topicsIds)
			->with('user', 'last_post', 'last_post.user')->withCount('posts')->paginate(7);

		return response()->json(['category' => $category, 'topics' => $topics]);
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
