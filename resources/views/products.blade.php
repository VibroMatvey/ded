@extends('layouts.main')

@section('products')
    <div class="page">
        <div class="products__page">
            <div class="products__title">
                <a href="/catalog">Каталог товаров</a>
                <span>{{ $category->title }}</span>
                <div class="products__sort">
                    <div class="products__sort_content">
                        <div class="products__sort_dropdown">
                            <div class="products__sort_dropdown_title" id="dropdownBtnProducts">
                                <span>Сортировать...</span>
                            </div>
                            <ul class="products__sort_dropdown_items">
                                <li class="products__sort_dropdown_item">По возрастанию цены</li>
                                <li class="products__sort_dropdown_item">По убыванию цены</li>
                                <li class="products__sort_dropdown_item">По популярности</li>
                                <li class="products__sort_dropdown_item">По кол-ву заказов</li>
                                <li class="products__sort_dropdown_item">По рейтингу</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="products__page_menu">
                @foreach($products as $product)
                    <a href="/product/{{ $product->id }}" style="text-decoration: none; color: #fff">
                        <div class="products__item">
                            <div class="products__item_image">
                                <img src="{{ asset('/storage/' . $product->image) }}" alt="">
                            </div>
                            <div class="products__item_title">
                                {{ $product->title }}
                            </div>
                            <div class="products__item_price">
                                {{ $product->price }} $
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
                    </a>
                    <div id="popupAdd_{{ $product->id }}" class="popup">
                        <div class="popup__body">
                            <div class="popup__content">
                                <div>
                                    <i class="fa-solid fa-xmark close-popup"></i>
                                </div>
                                <div>
                                    <label class="text-field__label" for="quantity"><h2>Выберите кол-во</h2></label>
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
                @endforeach
            </div>
        </div>
    </div>
@endsection
