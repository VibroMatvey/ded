@extends('layouts.main')

@section('cabinet')
    <div class="page">
        <div class="cabinet__page">
            cabinet page
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
            <div>

            </div>
        </div>
    </div>
@endsection
