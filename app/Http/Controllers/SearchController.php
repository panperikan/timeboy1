<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Time;

class SearchController extends Controller
{
    //
    public function show(Request $request){
        //フォームを機能させるために各情報を取得し、viewに返す
        $user = new User;
        $users = $user->getLists();
        $searchWord = $request->input('searchWord');
        $userId = $request->input('userId');

        return view('searchproduct', [
            'users' => $users,
            'searchWord' => $searchWord,
            'userId' => $userId
        ]);
    }
    


    //検索メソッド(searchproduct)
    public function search(Request $request)
    {
        //入力される値nameの中身を定義する
        $searchWord = $request->input('searchWord'); //商品名の値
        $userId = $request->input('userId'); //カテゴリの値

        $query = Time::query();
        //商品名が入力された場合、m_productsテーブルから一致する商品を$queryに代入
        if (isset($searchWord)) {
            $query->where('punchIn', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        //カテゴリが選択された場合、m_categoriesテーブルからcategory_idが一致する商品を$queryに代入
        if (isset($userId)) {
            $query->where('user_id', $userId);
        }

        //$queryをcategory_idの昇順に並び替えて$productsに代入
        $products = $query->orderBy('user_id', 'asc')->paginate(15);
        
        $total = $query->sum('workTime');

        //m_categoriesテーブルからgetLists();関数でcategory_nameとidを取得する
        $user = new User;
        $users = $user->getLists();

        return view('searchproduct', [
            'products' => $products,
            'users' => $users,
            'searchWord' => $searchWord,
            'total' => $total,
            'userId' => $userId
        ]);
    }

    //「\\」「%」「_」などの記号を文字としてエスケープさせる
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
}
