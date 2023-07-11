<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\PostLike;
use Illuminate\Http\Request;

class PostController extends Controller
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
	public function store(CreatePostRequest $request)
	{
		$data = $request->validated();


		// $post = Post::create([
		// 	'title' => $data['title'],
		// 	'content' => $data['content'],
		// 	'topic_id' => $data['topic_id'],
		// 	'user_id' => $data['user_id'],

		// ]);

		//	if (isset($request['post_id']) && $request['post_id'] !== null) {
		$post = Post::create([
			'title' => $data['title'],
			'content' => $data['content'],
			'topic_id' => $data['topic_id'],
			'user_id' => $data['user_id'],
			'post_id' => $data['post_id']

		]);
		// return 'yes yes';
		//} 

		// else {
		// 	$post = Post::create([
		// 		'title' => $data['title'],
		// 		'content' => $data['content'],
		// 		'topic_id' => $data['topic_id'],
		// 		'user_id' => $data['user_id'],
		// 	]);


		// }
		return response()->json(['status' => true, 'message' => 'post created!'], 201);
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		//
	}

	public function addLike(Request $request)
	{
		$data = $request->validate([
			'post_id' => 'required|numeric',
			'user_id' => 'required|numeric'
		]);

		$post = PostLike::create([
			'post_id' => $data['post_id'],
			'user_id' => $data['user_id']
		])->load('user');

		// $post_like = PostLike::where('id', $data['user_id'])->with('user')->get();
		$post->post_liked = true;
		return $post;
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
