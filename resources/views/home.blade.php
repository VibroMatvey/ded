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
                <div class="slider">
                    <div class="item">
                        <img src="{{ asset('images/slider1.jpeg') }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('images/slider2.jpg') }}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{ asset('images/slider3.jpg') }}" alt="">
                    </div>
                    <a class="prev" id="minusSlide">&#10094;</a>
                    <a class="next" id="plusSlide">&#10095;</a>
                </div>
                <div class="slider-dots">
                    <span class="slider-dots_item" onclick="currentSlide(1)"></span>
                    <span class="slider-dots_item" onclick="currentSlide(2)"></span>
                    <span class="slider-dots_item" onclick="currentSlide(3)"></span>
                </div>
            </div>
            <div class="container__info">
                <div class="container__info_title">
                    <span>СТРОИТЕЛЬНЫЙ ДЕД - ГАРАНТ КАЧЕСТВА</span>
                </div>
                <br>
                    Леруа Мерлен в Москве
                </br>
                <br>
                    Ассортимент интернет-магазина Леруа Мерлен включает различные группы товаров, предназначенных для строительно-ремонтных и отделочных работ, а также для сада. У нас каждый покупатель сможет приобрести по самой выгодной цене:
                </br>
                <br>
                    стройматериалы, инструменты и электротовары;
                    сантехническую продукцию и все для организации водоснабжения;
                    столярные изделия и скобяные изделия;
                    различные виды напольного покрытия и плитки;
                    краску, декор и товары для хранения;
                    все для обустройства кухни;
                    товары для организации освещения дома и придомового участка;
                    все для сада и огорода.
                </br>
                <br>
                    Широкий ассортимент товаров – это гарантия того, что каждый наш покупатель сможет подобрать оптимальное решение для реализации своего проекта.
                    Почему Леруа Мерлен
                </br>
                <br>
                    Преимущества покупок в интернет-магазине Леруа Мерлен:
                </br>
                <br>
                    лучшие товары по низким ценам;
                    широкий выбор товаров собственных торговых марок Леруа Мерлен для строительства, ремонта и сада;
                    возможность вернуть товар, который не подошел или не пригодился, в течение 100 дней с момента покупки;
                    высокий уровень клиентской поддержки (готовые решения по дизайну интерьера, проектирование кухонь онлайн, полезные советы и школа ремонта от Леруа Мерлен и т.д.)
                </br>
                <br>
                    Делайте покупки в интернет-магазине и гипермаркетах сети Леруа Мерлен – и Вы обязательно оцените все выгоды сотрудничества с Леруа Мерлен – компанией с мировым именем.
                </br>
                </div>
            </div>
            <div class="container__info">

            </div>
        </div>
    </div>
    <script>
        document.querySelector(`#minusSlide`).addEventListener('click' , minusSlide)
        document.querySelector(`#plusSlide`).addEventListener('click' , plusSlide)

        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlide() {
            showSlides(slideIndex += 1);
        }

        function minusSlide() {
            showSlides(slideIndex -= 1);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("item");
            let dots = document.getElementsByClassName("slider-dots_item");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
@endsection
