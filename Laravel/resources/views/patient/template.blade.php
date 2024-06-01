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
        <span class="menu-header-text">Moje zdrowie</span>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'patient.prescriptions' ? 'active' : '' }}">
        <a href="{{ route('patient.prescriptions') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-file"></i>
            <div>Recepty</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'patient.visits' ? 'active' : '' }}">
        <a href="{{ route('patient.visits') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-calendar-check"></i>
            <div>Wizyty</div>
        </a>
    </li>
@endsection
