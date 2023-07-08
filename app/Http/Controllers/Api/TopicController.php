<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TranslateController;
use App\Http\Requests\CreateTopicRequest;
use App\Models\Post;
use App\Models\Topic;
use App\Models\TopicCategory;
use Illuminate\Http\Request;

class TopicController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
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
	public function store(CreateTopicRequest $request)
	{
		$data = $request->validated();
		$url_name = (new TranslateController)->translate($data['title']);
		// return $data;

		$topicData = Topic::create([
			'title' => $data['title'],
			'user_id' => $data['user_id'],
			'url' => $url_name,
		]);

		$postData = Post::create([
			'title' => $data['title'],
			'content' => $data['content'],
			'user_id' => $data['user_id'],
			'topic_id' => $topicData->id,
			'main_post' => 1,
		]);

		$topic_categoryData = TopicCategory::create([
			'topic_id' => $topicData->id,
			'category_id' => $data['category_id']

		]);

		$topicData->save();
		$topic = Topic::all();
		return response()->json(['status' => true, 'topic' => $topic]);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		$topic = Topic::where('url', $id)->first();
		$posts = Post::where('topic_id', $topic->id)->with('user', 'reply_to.user')->get();
		return response()->json(['status' => true, 'topic' => $topic, 'posts' => $posts]);
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
