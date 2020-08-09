@extends('layouts.admin')
@section('title', '商品在庫の新規追加')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>商品在庫新規追加</h2>
                <form action="{{ action('Admin\StockController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">商品名</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="item" value="{{ old('title') }}">
                        </div>
                        <div class="col-md-5">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">個数</label>
                        <div class="col-md-2">
　　　　　　　　　　　　　　<input type="text" class="form-control" name="quantity" value="{{ old('title') }}">
                        </div>
                        <div class="col-md-8">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">合計金額</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="price" value="{{ old('title') }}">
                        </div>
                        <div class="col-md-7">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="追加">
                    <div>
                        <a href="{{ action('Admin\StockController@index') }}">管理者一覧画面へ</a>
                    </div>
                    <div>
                        <a href="{{ action('StockController@index') }}">トップページへ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection