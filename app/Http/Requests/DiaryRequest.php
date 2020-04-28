<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaryRequest extends FormRequest
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
            'title' => 'required',
            'body'  => 'required',
            'spot_id' => 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'body'  => 'メモ',
            'spot_id' => 'スポット'
        ];
    }

    public function messages()
    {
        return [
            'spot_id.required' => 'スポットを作成してください。'
        ];
    }
}
