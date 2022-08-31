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
                        <a href="#popupImg" class="popup-link">
                            <div class="product__image">
                                <img src="{{ asset('/storage/' . $product->image) }}" alt="">
                            </div>
                        </a>
                        <div class="product__price">
                            <span>{{ $product->price }} $</span>
                        </div>
                    </div>
                    <div class="right">
                        <div class="product__description">
                            <span>{{ $product->description }}</span>
                        </div>
                        <a href="#popupAdd_{{ $product->id }}" class="popup-link" style="color:#000;">
                            <div class="popup__addToCart">
                                <div class="popup__content_button">
                                    <div class="popup__button_title">
                                        <span>Добавить в корзину</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="popupAdd_{{ $product->id }}" class="popup">
        <div class="popup__body">
            <div class="popup__content">
                <div>
                    <i class="fa-solid fa-xmark close-popup"></i>
                </div>
                <div>
                    <label class="text-field__label" for="quantity_{{ $product->id }}"><h2>Выберите кол-во</h2></label>
                </div>
                <div class="popup__content_quantity">
                    <div class="number">
                        <button class="number-minus" type="button"
                                onclick="this.nextElementSibling.stepDown(); this.nextElementSibling.onchange();">
                            -
                        </button>
                        <input type="number" class="popup__content_number" id="quantity_{{ $product->id }}" max="100"
                               min="1" value="1"
                               readonly>
                        <button class="number-plus" type="button"
                                onclick="this.previousElementSibling.stepUp(); this.previousElementSibling.onchange();">
                            +
                        </button>
                    </div>
                    <div class="popup__addToCart" id="btnCart" data-id="{{ $product->id }}">
                        <div class="popup__content_button">
                            <div class="popup__button_title">
                                <span>Добавить в корзину</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="popupImg" class="popup">
        <div class="popup__body">
            <div>
                <img src="{{ asset('/storage/' . $product->image) }}" alt="" style="width: 100%">
            </div>
        </div>
    </div>
@endsection
