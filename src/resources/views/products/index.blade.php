@extends('layouts/app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
    <h2>商品一覧</h2>

    <a class="add-btn" href="{{ url('/products/register') }}">+ 商品を追加</a>

    <form action="/products/search" method="get">
        @csrf
        <input type="text" placeholder="商品名で検索">
        <button type="submit">検索</button>

        <p>価格順で表示</p>
        <select name="price" id="price">
            <option value="">価格で並べ替え</option>
            <option value="price_desc">高い順に表示</option>
            <option value="price_asc">低い順に表示</option>
        </select>
    </form>

    <div class="product-list">
        @foreach ($products as $product)
            <div class="product-item">
                <h3>{{ $product->name }}</h3>
                <p>価格: {{ $product->price }}円</p>

                @if ($product->image)
                    <a href="{{ url('/products/' . $product->id) }}">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-width: 200px; height: auto;">
                    </a>
                @else
                    <p>No Image</p>
                @endif
            </div>
        @endforeach
    </div>

    <div class="pagination-links">
        {{ $products->appends(request()->query())->links('vendor.pagination.custom') }}
    </div>
@endsection
