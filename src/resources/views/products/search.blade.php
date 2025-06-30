@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}" />
@endsection

@section('content')

<h2>
    @if (!empty($keyword))
        "{{ $keyword }}"の検索結果
    @else
        商品一覧
    @endif
</h2>

<form action="{{ url('/products') }}" method="get" class="search-form">
    <input type="text" name="keyword" placeholder="商品名で検索" value="{{ old('keyword', $keyword ?? '') }}">
    <button type="submit">検索</button>

    <p>価格順で表示</p>
    <select name="price_order" id="price_order">
        <option value="" @if(empty($priceOrder)) selected @endif>価格で並べ替え</option>
        <option value="asc" @if(isset($priceOrder) && $priceOrder == 'asc') selected @endif>低い順に表示</option>
        <option value="desc" @if(isset($priceOrder) && $priceOrder == 'desc') selected @endif>高い順に表示</option>
    </select>
</form>

@endsection
