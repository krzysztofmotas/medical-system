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
        <span class="menu-header-text">Obsługa pacjenta</span>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'doctor.create.visit' ? 'active' : '' }}">
        <a href="{{ route('doctor.create.visit') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-calendar"></i>
            <div>Nowa wizyta</div>
        </a>
    </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Analiza danych</span>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'doctor.expensive.medicines' ? 'active' : '' }}">
        <a href="{{ route('doctor.expensive.medicines') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-first-aid"></i>
            <div>Drogie leki</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'data.popular-medicines' ? 'active' : '' }}">
        <a href="" class="menu-link">
            <i class="menu-icon tf-icons bx bx-bar-chart"></i>
            <div>Popularność leków</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'data.top-doctors' ? 'active' : '' }}">
        <a href="" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user-check"></i>
            <div>Lekarze z największą liczbą wizyt</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'data.visit-duration' ? 'active' : '' }}">
        <a href="" class="menu-link">
            <i class="menu-icon tf-icons bx bx-time-five"></i>
            <div>Średni czas trwania wizyty</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'data.patient-age' ? 'active' : '' }}">
        <a href="" class="menu-link">
            <i class="menu-icon tf-icons bx bx-group"></i>
            <div>Statystyki wieku pacjentów</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'data.specialization-popularity' ? 'active' : '' }}">
        <a href="" class="menu-link">
            <i class="menu-icon tf-icons bx bx-medical"></i>
            <div>Popularność specjalizacji</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'data.visit-frequency' ? 'active' : '' }}">
        <a href="" class="menu-link">
            <i class="menu-icon tf-icons bx bx-calendar-check"></i>
            <div>Częstotliwość wizyt</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'data.visit-trends' ? 'active' : '' }}">
        <a href="" class="menu-link">
            <i class="menu-icon tf-icons bx bx-trending-up"></i>
            <div>Trendy wizyt</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'data.age-visits' ? 'active' : '' }}">
        <a href="" class="menu-link">
            <i class="menu-icon tf-icons bx bx-line-chart"></i>
            <div>Średnia liczba wizyt wg wieku</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'data.gender-distribution' ? 'active' : '' }}">
        <a href="" class="menu-link">
            <i class="menu-icon tf-icons bx bx-pie-chart-alt"></i>
            <div>Rozkład płci wg wieku</div>
        </a>
    </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Inne</span>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'patient.history' ? 'active' : '' }}">
        <a href="" class="menu-link">
            <i class="menu-icon tf-icons bx bx-history"></i>
            <div>Historia pacjentów</div>
        </a>
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
@endsection
