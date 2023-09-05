<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    // バリデーションルール
    public function rules()
    {
        return [
            'username' => 'required|string|max:30',
            'email' => 'required|max:100|email:filter,dns|unique:users',
           'password' => 'required|between:8,30|confirmed',
           'password_confirmation' => 'required|between:8,30',
        ];
    }

        //バリデーション エラーメッセージ
        public function messages(){
        return [
            'username.required' => 'ユーザー名は必須です。',
            'username.max' => '30文字以内で入力してください。',

            'email.required' => 'メールアドレスは必須です。',
            'email.max' => '100文字以内で入力してください。',
            'email.email:filter,dns' => 'メールアドレス形式で入力してください。',
            'email.unique:users' => '登録済みのメールアドレスです。',

            'password.required' => 'パスワードは必須です。',
            'password.between' => '8〜30文字で入力してください。',
            'password.between' => '8〜30文字で入力してください。',
            'password.confirmed' => 'パスワードが異なります',
        ];
    }
}
