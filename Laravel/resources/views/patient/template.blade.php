@extends('shared.dashboard')

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

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Personel</span>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'patient.all-doctors' ? 'active' : '' }}">
        <a href="{{ route('patient.all-doctors') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-plus-medical"></i>
            <div>Lekarze</div>
        </a>
    </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Inne</span>
    </li>

@endsection
