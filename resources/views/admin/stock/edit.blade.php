@extends('layouts.admin')
@section('title', '登録在庫の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>登録在庫編集</h2>
                <form action="{{ action('Admin\StockController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">新しい商品名</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" name="item" value="{{ $item_form->item }}">
                        </div>
                        <div class="col-md-5">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">新しい個数</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="quantity" value="{{ $item_form->quantity }}">
                        </div>
                        <div class="col-md-7">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">合計金額</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="price" value="{{ $item_form->price }}">
                        </div>
                        <div class="col-md-8">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-7">
                            <input type="hidden" name="id" value="{{ $item_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($item_form->histories != NULL)
                                @foreach ($item_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection