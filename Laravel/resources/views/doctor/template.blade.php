@extends('shared.dashboard')

@section('content')
    {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Strona główna /</span> Nowa wizyta</h4> --}}

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

    <li class="menu-item {{ Route::current()->getName() === 'doctor.manage.visits' ? 'active' : '' }}">
        <a href="{{ route('doctor.manage.visits') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-edit"></i>
            <div>Zarządzanie wizytami</div>
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

    <li class="menu-item {{ Route::current()->getName() === 'doctor.top.prescribed.medicines' ? 'active' : '' }}">
        <a href="{{ route('doctor.top.prescribed.medicines') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-bar-chart"></i>
            <div>Najczęściej przypisywane leki</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'doctor.patient.count.report' ? 'active' : '' }}">
        <a href="{{ route('doctor.patient.count.report') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-user-check"></i>
            <div>Lekarze z największą liczbą wizyt</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'doctor.visits.duration' ? 'active' : '' }}">
        <a href="{{ route('doctor.visits.duration') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-time-five"></i>
            <div>Średni czas trwania wizyty</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'doctor.specialization.popularity' ? 'active' : '' }}">
        <a href="{{ route('doctor.specialization.popularity') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-bar-chart-square"></i>
            <div>Popularność specjalizacji</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'doctor.average.visits.by.age' ? 'active' : '' }}">
        <a href="{{ route('doctor.average.visits.by.age') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-line-chart"></i>
            <div>Średnia liczba wizyt wg wieku</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'doctor.visits' ? 'active' : '' }}">
        <a href="{{ route('doctor.visits') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-calendar-check"></i>
            <div>Wizyty</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'doctor.top.diagnoses' ? 'active' : '' }}">
        <a href="{{ route('doctor.top.diagnoses') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-bar-chart-alt"></i>
            <div>Najczęstsze diagnozy</div>
        </a>
    </li>

    <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Inne</span>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'doctor.medicines' ? 'active' : '' }}">
        <a href="{{ route('doctor.medicines') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bxs-capsule"></i>
            <div>Leki</div>
        </a>
    </li>

    <li class="menu-item {{ Route::current()->getName() === 'doctor.doctors' ? 'active' : '' }}">
        <a href="{{ route('doctor.doctors') }}" class="menu-link">
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
