@extends('layouts.front')
@section('title', '在庫管理システムトップページ')

@section('content')
    <div class="container">
        <h2>在庫管理システムトップページ</h2>
        <br>
        <br>
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="title p-2">
                                    <h1>{{ str_limit($headline->item, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->quantity, 650) }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{{ str_limit($headline->price, 650) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->item, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->quantity, 1500) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->price, 1500) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
            <div>
               <a href="{{ action('Admin\StockController@create') }}">在庫を新規作成する</a>
            </div>
        </div>
    </div>
    </div>
@endsection