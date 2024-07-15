<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;

class InertiaTestController extends Controller
{
    public function index()
    {
        //全件表示したいので、第二引数の連想配列で、InertiaTestクラスから全件拾っている
        return Inertia::render('Inertia/Index', [
            'blogs' => InertiaTest::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Inertia/Create');
    }    

    public function show($id)
    {
       // dd($id);
       return inertia::render('Inertia/Show', 
       [
            'id' => $id,
            //idに該当するレコードを取得。もしなければ、Exceptionを返す。
            'blog' => InertiaTest::findOrFail($id)
       ]);
    }
//保存処理。requestで飛んでくるデータをsaveする
    public function store(Request $request)
    {

        //バリデーション。引っかかったらエラーがInertiaに渡る

        $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required'],
        ]);

        //まずはuseで読み込んだModelのインスタンス化
        $inertiaTest = new InertiaTest;
        //インスタンス化したModelの中に、requestで送られてきている変数を押し込む
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        return to_route('inertia.index')
        ->with([
            'message' => '登録しました'
        ]);

    }

    public function delete($id)
    {
        $book = InertiaTest::findOrFail($id);
        $book->delete();

        return to_route('inertia.index')
        ->with([
            'message' => '削除しました'
        ]);

    }

    
}
