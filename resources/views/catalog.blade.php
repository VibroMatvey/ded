@extends('layouts.main')

@section('catalog')
    <div class="page">
        <div class="catalog__page">
            <div class="catalog__page_title">
                <span>Каталог товаров</span>
            </div>
            <div class="catalog__page_menu">
                @foreach($categories as $category)
                    <a href="/products/{{ $category->id }}">
                        <div class="catalog__page_menu_item">
                            {{ $category->title }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
