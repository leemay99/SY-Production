<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index(Request $request)
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        return view('item.index', compact('items'));
    }

    /**
     * 検索
     */
    public function search(Request $request)
    {
        
        dd($request->search);
        
    }
               


    /**
     * 商品登録
    */
     public function add(Request $request)
    {
      // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
             $this->validate($request, [
                 'name' => 'required|max:100',
             ]);

             // 商品登録
             Item::create([
                 'user_id' => Auth::user()->id,
                 'name' => $request->name,
                 'type' => $request->type,
                 'detail' => $request->detail,
                 'price' => $request->price,
             ]);

             return redirect('/items');
         }

         return view('item.add');
     }

    /**
     * 商品削除
     */
    public function delete(Request $request)
    {
        $item = Item::find($request->id);
        $item->delete();

        return redirect('/items');
    }
}
