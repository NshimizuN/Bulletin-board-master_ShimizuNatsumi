<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'exists:users,email', function ($attribute, $value, $fail) {
                $user = \App\Models\Users\User::where('email', $value)->first();
                if (!$user) {
                    $fail('emailとpasswordが一致しません。');
                }
            }],
            'password' => ['required', function ($attribute, $value, $fail) {
                $credentials = [
                    'email' => $this->input('email'),
                    'password' => $value,
                ];
                if (!Auth::attempt($credentials)) {
                    $fail('emailとpasswordが一致しません。');
                }
            }],
        ];
    }

            //バリデーション エラーメッセージ
        public function messages(){
        return [
         'email.required' => 'emailは必須です。',
        'email.exists' => '登録のないemailです。',
        'password.required' => 'emailとpasswordが一致しません。',
        ];
    }
}
