@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/show.css') }}" />
@endsection

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<nav class="breadcrumb">
    <a href="{{ url('/products') }}">商品一覧</a> &gt; {{ $product->name }}
</nav>

<form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">商品名</span>
            <span class="form__label--required">必須</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name', $product->name) }}" />
            </div>
            <div class="form__error">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">値段</span>
            <span class="form__label--required">必須</span>
        </div>
        <div class="form__group-content">
            <div class="form__input--text">
                <input type="text" name="price" placeholder="値段を入力" value="{{ old('price', $product->price) }}" />
            </div>
            <div class="form__error">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">季節</span>
            <span class="form__label--required">必須</span>
        </div>
        <div class="season-options">
            @php
                $selectedSeasons = is_string($product->seasons) ? explode(',', $product->seasons) : ($product->seasons ?? []);
            @endphp
            <label class="fake-radio">
                <input type="checkbox" name="seasons[]" value="spring" {{ in_array('spring', old('seasons', $selectedSeasons)) ? 'checked' : '' }}>
                <span class="custom-circle"></span>春
            </label>

            <label class="fake-radio">
                <input type="checkbox" name="seasons[]" value="summer" {{ in_array('summer', old('seasons', $selectedSeasons)) ? 'checked' : '' }}>
                <span class="custom-circle"></span>夏
            </label>

            <label class="fake-radio">
                <input type="checkbox" name="seasons[]" value="autumn" {{ in_array('autumn', old('seasons', $selectedSeasons)) ? 'checked' : '' }}>
                <span class="custom-circle"></span>秋
            </label>

            <label class="fake-radio">
                <input type="checkbox" name="seasons[]" value="winter" {{ in_array('winter', old('seasons', $selectedSeasons)) ? 'checked' : '' }}>
                <span class="custom-circle"></span>冬
            </label>
        </div>
        <div class="form__error">
            @error('seasons')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">商品説明</span>
            <span class="form__label--required">必須</span>
        </div>
        <div class="form__group-content">
            <textarea name="description" class="form-item-textarea" placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>
            <div class="form__error">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <div class="form__group">
        <div class="form__group-title">
            <span class="form__label--item">商品画像</span>
            <span class="form__label--required">必須</span>
        </div>
        <div class="form__group-content">
            @if ($product->image)
                <img src="{{ asset($product->image) }}" alt="現在の画像" style="max-width: 150px; height: auto; margin-bottom: 10px;">
            @else
                <p>画像</p>
            @endif
            <input type="file" name="image" class="form-item-file">
            <div class="form__error">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <a class="back-btn" href="{{ url('/products') }}">戻る</a>

    <button type="submit">変更を保存</button>

</form>

@endsection