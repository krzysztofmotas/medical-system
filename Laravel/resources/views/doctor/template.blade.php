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

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Personel</span>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'doctor.all-doctors' ? 'active' : '' }}">
        <a href="{{ route('doctor.all-doctors') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-plus-medical"></i>
            <div>Lekarze</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'doctor.all-patients' ? 'active' : '' }}">
        <a href="{{ route('doctor.all-patients') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-face"></i>
            <div>Pacjenci</div>
        </a>
    </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Inne</span>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'doctor.expensive.medicines' ? 'active' : '' }}">
        <a href="{{ route('doctor.expensive.medicines') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-dock-top"></i>
            <div>Drogie leki</div>
        </a>
    </li>
@endsection
