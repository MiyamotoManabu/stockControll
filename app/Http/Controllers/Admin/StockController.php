<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Item;
use App\History;

use Carbon\Carbon;

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
  public function edit(Request $request)
  {
      // item Modelからデータを取得する
      $item = Item::find($request->id);
      if (empty($item)) {
        abort(404);    
      }
      return view('admin.stock.edit', ['item_form' => $item]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, item::$rules);
      // item Modelからデータを取得する
      $item = item::find($request->id);
      // 送信されてきたフォームデータを格納する
      $item_form = $request->all();
      unset($item_form['_token']);

      // 該当するデータを上書きして保存する
      $item->fill($item_form)->save();
      $history = new History;
      $history->item_id = $item->id;
      $history->edited_at = Carbon::now();
      $history->save();

      return redirect('admin/stock');
  }
  
  public function delete(Request $request)
  {
      // 該当するItem Modelを取得
      $item = Item::find($request->id);
      // 削除する
      $item->delete();
      return redirect('admin/stock');
  }
}
