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
        $query = Item
            ::where('items.status', 'active');
            
        if ($request->search){
            $query->where('items.name','LIKE','%'.$request->search.'%');
        }
        
        $items=$query->get();
        
        return view('item.index', compact('items'));

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

    /**
     * 編集
     */
    public function edit(Request $request,$id)
    {
        $types = Item::TYPES;
        $item = Item::find($id);
    
        

        return view('item.edit', ['item'=>$item]);
    }





    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
        ]);
        
        $item = Item::find($id);
        $item->user_id = Auth::id();
        //$item->user_id = 1;//後から上の行と変更する
        $item->name = $request->input(["name"]);
        $item->type = $request->input(["type"]);
        $item->price = $request->input(["price"]);
        $item->detail = $request->input(["detail"]);
        
        $item->save();

        return redirect('/items');
    }
}

