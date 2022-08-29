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
                    <a href="/product/{{ $product->id }}" style="text-decoration: none">
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
                            <div class="products__item_add" id="btnCart" data-id="{{ $product->id }}">
                                <button>Добавить в корзину</button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
