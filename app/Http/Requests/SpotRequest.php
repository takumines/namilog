<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpotRequest extends FormRequest
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
            'name'  => 'required',
            'place' => 'required',
            'body'  => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'スポット名',
            'place' => '都道府県',
            'body'  => '特長メモ',
        ];
    }
}
