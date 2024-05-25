@extends('shared.dashboard')

@section('title', 'Strona główna')

@section('content')
    @yield('component-content')
@endsection

@section('menu')
    <li class="menu-item {{ Route::current()->getName() === 'dashboard.index' ? 'active' : '' }}">
        <a href="{{ route('dashboard.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div>Strona główna</div>
        </a>
    </li>
@endsection
