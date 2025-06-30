@extends('layouts/app')

@section ('css')
    <link rel="stylesheet" href="{{ asset('css/create.css') }}" />
@endsection

@section ('content')


<h2>商品登録</h2>
<form action="{{ route('products.store', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">商品名</span>
            <span class="form__label--required">必須</span>
          </div>
            <div class="form__group-content">
                <div class="form__input--text">
                  <input type="text" name="name" placeholder="商品名を入力" />
                </div>
              <div class="form__error">
                @error('name')
                        {{ $message }}
                        @enderror
              </div>
            </div>

        <div class="form__group-title">
            <span class="form__label--item">値段</span>
            <span class="form__label--required">必須</span>
          </div>
            <div class="form__group-content">
                <div class="form__input--text">
                  <input type="text" name="price" placeholder="値段を入力" />
                </div>
              <div class="form__error">
              @error('price')
                        {{ $message }}
                        @enderror
              </div>
            </div>

            <div class="form__group-title">
            <span class="form__label--item">商品画像</span>
            <span class="form__label--required">必須</span>
            </div>
             
              <div class="form__error">
              @error('image')
                    {{ $message }}
                @enderror
              </div>
            </div>
        </div>
<div class="form__group-title">
            <span class="form__label--item">季節</span>
            <span class="form__label--required">必須</span>
            <span class="form__label--multi-select">複数選択可</span>
            </div>
             
            <div class="season-options">
  <label class="fake-radio">
    <input type="checkbox" name="seasons[]" value="spring">
    <span class="custom-circle"></span>
    春
  </label>

  <label class="fake-radio">
    <input type="checkbox" name="seasons[]" value="summer">
    <span class="custom-circle"></span>
    夏
  </label>

  <label class="fake-radio">
    <input type="checkbox" name="seasons[]" value="autumn">
    <span class="custom-circle"></span>
    秋
  </label>

  <label class="fake-radio">
    <input type="checkbox" name="seasons[]" value="winter">
    <span class="custom-circle"></span>
    冬
  </label>
</div>
  
</div>
              <div class="form__error">
              @error('seasons')
                        {{ $message }}
                        @enderror
              </div>

                <div class="form__group-title">
                    <span class="form__label--item">商品説明</span>
            <span class="form__label--required">必須</span>

                </div>
                <div class="form__group-content">
                    <textarea name="description" class="form-item-textarea" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                    <div class="form__error">
                        @error('description')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
<a class="back-btn" href="{{ url('/products') }}">戻る</a>
            <button type="submit" class="btn-submit">登録</button>

</form>