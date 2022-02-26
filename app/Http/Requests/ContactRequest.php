<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            //
            'lastName' => 'required',
            'firstName' => 'required',
            'gender' => 'required',
            'email' => 'required | email',
            'postcode' => 'required | between:8,8 | regex:/[0-9]{3}+-[0-9]{4}/' ,
            'address' => 'required',
            'opinion' => 'required | max:120'
        ];
    }

    public function messages()
    {
        return [
            'postcode.between' => '123-4567という形で入力してください。',
            'postcode.regex' => '123-4567という形で入力してください。',
            'opinion.required' => '120字以内で入力してください。',
            'opinion.max' => '120字以内で入力してください。'
        ];
    }

    // データ加工
    public function prepareForValidation()
    {
        //全角英数字を半角に変換
        $this->merge(['postcode' => mb_convert_kana($this->postcode, 'a')]);
    }
}
