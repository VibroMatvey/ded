<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BUILDAD</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/6bb43ed9b0.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <a href="/">
            <div class="body__name">
                <div class="logotype">
                    <i class="fa-solid fa-hammer"></i>
                </div>
                <div class="name">
                    <span>Строительный дед</span>
                </div>
            </div>
        </a>
        <div class="body__menu">
            <div class="menu">
                @if($role != 'ADMIN')
                    <div class="menu__item">
                        <a href="/">Главная</a>
                    </div>
                    <div class="menu__item">
                        <a href="/about">О нас</a>
                    </div>
                    <div class="menu__item">
                        <a href="/catalog">Каталог товаров</a>
                    </div>
                @else
                    <div class="menu__item">
                        <a href="/">Категории</a>
                    </div>
                    <div class="menu__item">
                        <a href="/about">Товары</a>
                    </div>
                    <div class="menu__item">
                        <a href="/catalog">Заказы</a>
                    </div>
                    <div class="menu__item">
                        <a href="/catalog">Пользователи</a>
                    </div>
                @endif
            </div>
            <div class="log">
                <a href="#popupCart" class="popup-link">
                    <div class="cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>1</span>
                    </div>
                </a>
                @if(isset($data))
                    @if($role == 'USER')
                        <a href="/cabinet">
                            <div class="cart">
                                <i class="fa-solid fa-user"></i>
                                @if (isset($data->name))
                                    <span>{{ $data->name }}</span>
                                @endif
                            </div>
                        </a>
                    @endif
                    @if($role == 'ADMIN')
                        <a href="/cabinet/admin">
                            <div class="cart">
                                <i class="fa-solid fa-user"></i>
                                @if (isset($data->name))
                                    <span>{{ $data->name }}</span>
                                @endif
                            </div>
                        </a>
                    @endif
                    @if($role == 'GUEST')
                        <a href="#popupLogin" class="popup-link">
                            <div class="cart">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        </a>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <div class="main">
        @yield('home')
        @yield('about')
        @yield('catalog')
        @yield('products')
        @yield('product')
        @if(isset($data) )
            @if($role == 'USER')
                @yield('cabinet')
            @elseif($role == 'ADMIN')
                @yield('admin')
            @endif
        @endif
    </div>
    @if($role != 'ADMIN')
        <div class="footer">
            <div class="content__footer">
                <div class="numbers__footer">
                    <div class="numbers__footer_item">
                        <i class="fa-solid fa-phone"></i>
                        <span>8-800-901-12-12 - Начальство Семен</span>
                    </div>
                    <div class="numbers__footer_item">
                        <i class="fa-solid fa-phone"></i>
                        <span>8-800-901-12-12 - Менеджер Снежана</span>
                    </div>
                    <div class="numbers__footer_item">
                        <i class="fa-solid fa-phone"></i>
                        <span>8-800-901-12-12 - Юрист Юра</span>
                    </div>
                </div>
                <div class="media__footer">
                    <a href="https://web.telegram.org/" target="_blank">
                        <div class="media__footer_item">
                            <i class="fa-brands fa-telegram"></i>
                            <span class="media__footer_title">Телеграм</span>
                        </div>
                    </a>
                    <a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiKndzcsuH5AhWmmIsKHVurDcQQFnoECAsQAQ&url=https%3A%2F%2Fwww.instagram.com%2F&usg=AOvVaw1cBeRoOpMhZ3-x5M1sA3Fm"
                       target="_blank">
                        <div class="media__footer_item">
                            <i class="fa-brands fa-instagram"></i>
                            <span class="media__footer_title">Инстаграм</span>
                        </div>
                    </a>
                    <a href="https://www.google.com/" target="_blank">
                        <div class="media__footer_item">
                            <i class="fa-brands fa-google"></i>
                            <span class="media__footer_title">Гугл</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
</div>
@endif
<div id="popupLogin" class="popup">
    <div class="popup__body">
        <div class="popup__content">
            <div>
                <i class="fa-solid fa-xmark close-popup"></i>
            </div>
            <div class="form__header">
                <H2>ВХОД</H2>
            </div>
            <div class="signin">
                <form action="{{ route('login') }}" method="POST" class="popup__form">
                    @csrf
                    <div class="popup__form_item">
                        <label for="emaillogin">
                            <span>Эл. почта</span>
                        </label>
                        <input name="email" type="email" id="emaillogin"
                               class="popup__form_input @error('email') is-invalid @enderror">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="popup__form_item">
                        <label for="passwordlogin">
                            <span>Пароль</span>
                        </label>
                        <input name="password" id="passwordlogin" type="password" class="popup__form_input" required
                               autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Запомнить меня') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="form__btn_submit">
                        {{ __('Войти') }}
                    </button>
                </form>
                <div class="form__footer">
                    <span class="signupBtn">Нет аккаунта? Вот <a id="signupBtn" href="">Регистрация</a></span>
                </div>
            </div>
            <div class="signup">
                <form action="/register" method="POST" class="popup__form">
                    @csrf
                    <div class="popup__form_item">
                        <label for="email">
                            <span>Эл. почта</span>
                        </label>
                        <input name="email" id="email" type="email" class="popup__form_input">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="popup__form_item">
                        <label for="name">
                            <span>Имя</span>
                        </label>
                        <input name="name" id="name" type="text" class="popup__form_input">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="popup__form_item">
                        <label for="password">
                            <span>Пароль</span>
                        </label>
                        <input name="password" id="password" type="password" class="popup__form_input">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="popup__form_item">
                        <label for="password_c">
                            <span>Повторите пароль</span>
                        </label>
                        <input name="password_confirmation" id="password_c" type="password" class="popup__form_input">
                    </div>
                    <input type="submit" value="Регистрация" class="form__btn_submit">
                </form>
                <div class="form__footer">
                    <span class="signinBtn">Есть аккаунт? Вот <a id="signinBtn" href="">Вход</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="popupCart" class="popup">
    <div class="popup__body">
        <div class="popup__content">
            <div>
                <i class="fa-solid fa-xmark close-popup"></i>
            </div>
            <div>
                <h2>Корзина</h2>
            </div>
            <div>
                items cart
            </div>
        </div>
    </div>
</div>
</body>
</html>
