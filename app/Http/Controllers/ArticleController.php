<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//6-2
use App\Models\Article;
//8-4追加分
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //6-2
    public function showList() {
        // インスタンス生成
        $model = new Article();
        $articles = $model->getList();

        return view('list', ['articles' => $articles]);
    }

    //7-4追加分
    public function showRegistForm() {
        return view('regist');
    }

    //8-4追加分
    public function registSubmit(ArticleRequest $request) {

        // トランザクション開始
        DB::beginTransaction();
    
        try {
            // 登録処理呼び出し
            $model = new Article();
            $model->registArticle($request);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back();
        }
    
        // 処理が完了したらregistにリダイレクト
        return redirect(route('regist'));
    }

}
