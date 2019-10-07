<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
            'user_id' => 'required|numeric',
            'tag' => 'required',
            'image' => 'required|file|image',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください。',
            'content.required' => 'キャプションを入力してください。',
            'tag.required' => 'タグを入力してください。',
            'image.required' => 'ファイルを選択してください。',
            'image.image' => 'ファイルが異なります。',
        ];
    }
}
