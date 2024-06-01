@extends('shared.template')

@section('head')
    <link rel="stylesheet" href="{{ asset('vendor/css/pages/page-auth.css') }}" />
@endsection

@section('title', 'Rejestracja')

@section('body')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="#" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder">
                                    <i class="bx bx-plus-medical me-1 text-primary"></i>
                                    medical system
                                </span>
                            </a>
                        </div>

                        <h4 class="mb-2">Zaczynamy wspólną drogę w kierunku Twojego zdrowia! 🚀</h4>
                        <p class="mb-4">Zarejestruj się, aby zarządzać swoimi danymi medycznymi w prosty i przyjemny
                            sposób!</p>

                        <form class="mb-3" action="{{ route('process.register') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Imię</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Podaj swoje imię" value="{{ old('name') }}" autofocus required />
                                @error('name')
                                    <div class="form-text text-warning">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Nazwisko</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Podaj swoje nazwisko" value="{{ old('last_name') }}" required />

                                @error('last_name')
                                    <div class="form-text text-warning">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Płeć</label>
                                <select class="form-select" id="gender" name="gender" required value="{{ old('gender') }}">
                                    <option value="Mężczyzna">Mężczyzna</option>
                                    <option value="Kobieta">Kobieta</option>
                                    <option value="Inna">Inna</option>
                                </select>
                                @error('gender')
                                    <div class="form-text text-warning">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Adres</label>
                                <input value="{{ old('address') }}" type="text" class="form-control" id="address" name="address" placeholder="Podaj swój adres" required />
                                @error('address')
                                    <div class="form-text text-warning">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Numer telefonu</label>
                                <input value="{{ old('phone_number') }}" type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Podaj swój numer telefonu" required />
                                @error('phone_number')
                                    <div class="form-text text-warning">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Data urodzenia</label>
                                <input value="{{ old('date_of_birth') }}" type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Podaj swoją datę urodzenia" required />
                                @error('date_of_birth')
                                    <div class="form-text text-warning">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Zarejestruj się</button>
                            </div>
                        </form>

                        <p class="text-center">
                            Posiadasz już konto w naszej placówce?<br>
                            <a href="{{ route('dashboard.index') }}">Zaloguj się</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
