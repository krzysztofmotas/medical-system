@extends('doctor.template')

@section('title', 'Strona główna')

@section('component-content')
    <div class="d-flex justify-content-start">
        <div class="card h-auto w-25 mx-2">
            <img src="images/doctor.jpg" alt="Zdjęcie lekarza" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Lekarze</h5>
                <p class="card-text">
                    Sprawdź listę lekarzy
                </p>
                <a href="{{ route('doctor.all-doctors') }}" class="btn btn-outline-primary">Przejdź</a>
            </div>
        </div>
        <div class="card h-auto w-25 mx-2">
            <img src="images/patients.jpg" alt="Zdjęcie lekarza" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Pacjenci</h5>
                <p class="card-text">
                    Sprawdź listę pacjentów
                </p>
                <a href="{{ route('doctor.all-patients') }}" class="btn btn-outline-primary">Przejdź</a>
            </div>
        </div>
    </div>
@endsection
