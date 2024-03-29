@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
    <!-- 検索バー追加 -->  
    <form class="search" action="{{ url('items') }}">
                   <div>
                       <input type="search" name="search" value="{{request('search')}}" placeholder="キーワード入力">
                       <input class="search-btn" type="submit" value="検索する">
                   </div>

    </form> 
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                    <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>価格</th>
                                <th>詳細</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    
                                    <td>{{ number_format($item->price) }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td>
                                        <form action="{{ url('items/delete') }}" method="POST"
                                            onsubmit="return confirm('削除します。よろしいですか？');">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id}}">
                                            <input type="submit" value="削除" class="btn btn-danger">
                                       </form>
                                    </td>
                                    <td><a href="/items/edit/{{$item->id}}"><button type="button" class="btn btn-sm btn-outline-primary" >編集</button></a></td>
                                 </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css') 
@stop 

@section('js')
@stop
