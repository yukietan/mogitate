@extends('layouts/app')

@section ('css')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}" />
@endsection

@section ('content')

<h2>””の商品一覧</h2>

<form action="/products/search" method="get">
@csrf
<input type="text" placeholder="商品名で検索">
<button type="submit">検索</button>

<p>価格順で表示</p>
<select name="price" id="price">
            <option value="">価格で並べ替え</option>
            <option value="price_desc" >高い順に表示</option>
            <option value="price_asc" >低い順に表示</option>
        </select>
        
</form>