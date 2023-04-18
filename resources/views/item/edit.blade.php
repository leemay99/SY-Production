@extends('layouts.app')
 
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="font-size: 1rem;">商品内容変更画面</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/items') }}">戻る</a>
        </div>
    </div>
</div>

<div style="text-align: left;">
    <form action="/items/update/{{$item->id}}" method="POST">
    @csrf

        <div class="row">
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="name" value="{{ $item->name }}" class="form-control" placeholder="商品名">
                    @error('name')
                        <span style="color:red;">商品名を入力してください</span>
                    @enderror
                </div>
            </div>
            
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <input type="text" name="price" value="{{ $item->price }}" class="form-control" placeholder="価格">
                    @error('price')
                    <span style="color:red;">価格を数値で入力してください</span>
                     @enderror
                </div>
            </div>
            <div class="col-12 mb-2 mt-2">
                <div class="form-group">
                    <textarea name="detail" class="form-control" style="height: 100px" placeholder="詳細">{{ $item->detail }}</textarea>
                    @error('detail')
                    <span style="color:red;">詳細を500文字以内で入力してください</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 mb-2 mt-2">

            </div>
                
                <div class="col-12 mb-2 mt-2">
                    <button type="submit" class="btn btn-primary w-100">更新</button>
                </div>
            </div>
        </div>
    </form>
    
</div>
@stop 

@section('css')
@stop

@section('js')
@stop