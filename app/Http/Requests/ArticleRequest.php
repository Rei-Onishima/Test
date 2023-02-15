<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //元々はfalse(ブラウザで「403 This action is unauthorized.」の表示がでるためtrueに変更→正常に動作)
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //8-2追加分
        return [
            'title' => 'required | max:255',
            'url' => 'required | max:255 | url',
            'comment' => 'max:10000',
        ];
    }

    //8-3追加分
    /**
     * 項目名
     * 
     * @return array
     */
    public function attributes()
    {
        return[
            'title' => 'タイトル',
            'url' => 'URL',
            'comment' => 'コメント',
        ];
    }
    
    //8-3追加分
    /**
     * エラーメッセージ
     * 
     * @return array
     */
    public function messages() {
        return [
            'title.required' => ':attributeは必須項目です。',
            'title.max' => ':attributeは:max字以内で入力してください。',
            'url.required' => ':attributeは必須項目です。',
            'url.max' => ':attributeは:max字以内で入力してください。',
            'url.url' => ':attributeはURL形式で入力してください。',
            'comment.max' => ':attributeは:max字以内で入力してください。',
        ];
    }
}
