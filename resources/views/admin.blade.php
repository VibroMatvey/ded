@extends('layouts.main')

@section('admin')
    <div class="page">
        <div class="admin__page">
            ADMIN PAGE
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
        </div>
    </div>
@endsection
