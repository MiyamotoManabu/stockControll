<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Item;

class StockController extends Controller
{
  public function add()
    {
        return view('admin.stock.create');
    }
  // 以下を追記
  public function create(Request $request)
    {
      // 以下を追記
      // Varidationを行う
      $this->validate($request, Item::$rules);
      
      $item = new Item;
      $form = $request->all();
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      $item->fill($form);
      $item->save();
      // admin/stock/createにリダイレクトする
        return redirect('admin/stock/create');
    }
    public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = Item::where('item', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = Item::all();
      }
      return view('admin.stock.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
}
