@extends('layouts.main')

@section('home')
    <div class="page">
        <div class="home__page">
            <div class="container__search">
                <div class="search__content">
                    <input type="search" class="search__input" placeholder="Что ищете?" aria-describedby="searchButton">
                    <button id="searchButton" class="search__button">
                        <i class="fa-solid fa-magnifying-glass" style="color: #1a202c"></i>
                    </button>
                </div>
            </div>
            <div class="container__slider">
                <div class="single-item">
                    <div>asd</div>
                    <div>asd</div>
                    <div>asd</div>
                    <div>asd</div>
                </div>
            </div>
            <div class="container__info">
                123
            </div>
            <div class="container__info">
                321
            </div>
        </div>
    </div>
@endsection
