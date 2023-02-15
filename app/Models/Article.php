<?php
//5-1
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    //6-1
    public function getList() {
        // articlesテーブルからデータを取得
        $articles = DB::table('articles')->get();

        return $articles;
    }

    //8-5追加分
    public function registArticle($data) {
        // 登録処理
        DB::table('articles')->insert([
            'title' => $data->title,
            'url' => $data->url,
            'comment' => $data->comment,
        ]);
    }
}
