@extends('patient.template')

@section('title', 'Lista lekarzy')

@section('component-content')
    <div class="container mt-5 mb-5">
        <h1 class="text-center">Lista Doktorów</h1>
        <div class="row justify-content-center">
            @if (!empty($doctors))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Specjalizacja</th>
                            <th>Numer telefonu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{ $doctor['ID'] }}</td>
                                <td>{{ $doctor['NAME'] }}</td>
                                <td>{{ $doctor['LAST_NAME'] }}</td>
                                <td>{{ $doctor['SPECIALIZATION'] }}</td>
                                <td>{{ $doctor['PHONE_NUMBER'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">Brak doktorów do wyświetlenia.</p>
            @endif
        </div>
    </div>
@endsection
