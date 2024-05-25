@extends('doctor.template')

@section('component-content')
    <div class="container mt-5 mb-5">
        <h1 class="text-center">Lista Pacjentów</h1>
        <div class="row justify-content-center">
            @if (!empty($patients))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Adres zamieszkania</th>
                            <th>Numer telefonu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                            <tr>
                                <td>{{ $patient['ID'] }}</td>
                                <td>{{ $patient['NAME'] }}</td>
                                <td>{{ $patient['LAST_NAME'] }}</td>
                                <td>{{ $patient['ADDRESS'] }}</td>
                                <td>{{ $patient['PHONE_NUMBER'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">Brak pacjentów do wyświetlenia.</p>
            @endif
        </div>
    </div>
@endsection