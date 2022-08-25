@extends('layouts.main')

@section('catalog')
    <div class="page">
        <div class="cabinet__page">
            cabinet page
            <div class="logout">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
