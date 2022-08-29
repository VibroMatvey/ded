@extends('layouts.main')

@section('admin')
    <div class="page">
        <div class="admin__page">
            <div class="logout__content">
                <a href="{{ route('logout') }}"
                   class="logout"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <div class="admin__page_action">
                <div class="create__product">
                    <div class="create__product_title">
                        <span>Добавить товар</span>
                    </div>
                    <form action="/api/products" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="create__product_item">
                            <label for="name">Название товара</label>
                            <input id="name" type="text" name="title" >
                        </div>
                        <div class="create__product_item">
                            <label for="description">Описание товара</label>
                            <input id="description" type="text" name="description">
                        </div>
                        <div class="create__product_item">
                            <label for="price">Цена товара</label>
                            <input id="price" type="number" name="price">
                        </div>
                        <div class="create__product_item" style="width: 200px">
                            <label for="image">Изображение товара</label>
                            <input id="image" type="file" name="image">
                        </div>
                        <div class="create__product_item">
                            <label for="category">Выберите категорию</label>
                            <select id="category" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="create__product_item">
                            <input type="submit" value="отправить">
                        </div>
                    </form>
                </div>
                <div class="create__category">
                    <div class="create__category_title">
                        <span>Добавить категорию</span>
                    </div>
                    <form action="/api/categories" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="create__category_item">
                            <label for="title_category">Название категории</label>
                            <input id="title_category" type="text" name="title" placeholder="Название">
                        </div>
                        <div class="create__category_item">
                            <label for="image_category">Изображение категории</label>
                            <input id="image_category" type="file" name="image">
                        </div>
                        <div class="create__category_item">
                            <input type="submit" value="отправить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
