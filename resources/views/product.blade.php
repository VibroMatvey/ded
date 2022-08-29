@extends('layouts.main')

@section('product')
    <div class="page">
        <div class="product__page_back">
            @foreach($category as $c)
                <a href="/products/{{ $c->id }}">
                    {{ $c->title }}
                </a>
            @endforeach
        </div>
        <div class="product__page">
            <div class="product__page_body">
                <div class="product__page_content">
                    <div class="left">
                        <div class="product__title">
                            <span>{{ $product->title }}</span>
                        </div>
                        <div class="product__image">
                            <img src="{{ asset('/storage/' . $product->image) }}" alt="">
                        </div>
                        <div class="product__price">
                            <span>{{ $product->price }} $</span>
                        </div>
                        <div class="product__page_quantity">
                            <input type="number" id="quantity" max="100" min="1" value="1" onkeypress="return false">
                        </div>
                    </div>
                    <div class="right">
                        <div class="product__description">
                            <span>{{ $product->description }}</span>
                        </div>
                        <div class="product__addToCart" id="btnCart" data-id="{{ $product->id }}">
                            <div class="product__button">
                                <div class="product__button_title">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
