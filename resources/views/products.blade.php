@extends('layouts.main')

@section('products')
    <div class="page">
        <div class="products__page">
            <div class="products__title">
                <a href="/catalog">Назад</a>
                <span>{{ $category->title }}</span>
            </div>
            <div class="products__page_menu">
            @foreach($products as $product)
                <div class="products__page_menu_item">
                    {{ $product->title }}
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection
