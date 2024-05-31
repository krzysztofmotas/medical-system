@extends('doctor.template')

@section('title', 'Lekarze z największą liczbą wizyt')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Lekarze z największą liczbą wizyt</h5>

        @if (empty($report))
            <div class="alert alert-danger mx-4" role="alert">
                Nie znaleziono żadnych danych.
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Doktora</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Specjalizacja</th>
                            <th>Numer telefonu</th>
                            <th>Całkowita liczba wszystkich wizyt</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($report as $doctor)
                            <tr>
                                <td>{{ $doctor['ID'] }}</td>
                                <td>{{ $doctor['NAME'] }}</td>
                                <td>{{ $doctor['LAST_NAME'] }}</td>
                                <td>{{ $doctor['SPECIALIZATION'] }}</td>
                                <td>{{ $doctor['PHONE_NUMBER'] }}</td>
                                <td>{{ $doctor['PATIENT_COUNT'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
