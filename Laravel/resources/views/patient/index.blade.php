@extends('patient.template')

@section('title', 'Strona główna')

@section('component-content')
    <p>Zalogowany jako {{ Auth::user()->name }} {{ Auth::user()->last_name }}</p>
    <div class="d-flex justify-content-start">
        <div class="card h-auto w-25 mx-2">
            <img src="images/doctor.jpg" alt="Zdjęcie lekarza" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Lekarze</h5>
                <p class="card-text">
                    Sprawdź listę dostępnych lekarzy!
                </p>
                <a href="{{ route('patient.all-doctors') }}" class="btn btn-outline-primary">Przejdź</a>
            </div>
        </div>
    </div>
@endsection
