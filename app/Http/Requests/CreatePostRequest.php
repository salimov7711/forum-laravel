<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
	 */
	public function rules(): array
	{
		return [
			'title' => ['required', 'string', 'max:60'],
			'content' => ['required', 'string'],
			'user_id' => ['required', 'numeric'],
			'topic_id' => ['required', 'numeric'],
		];
	}

	public function messages(): array
	{
		return [

			'title.min' => 'Коичество символов не должно быть ,больше :max'

		];
	}
}
