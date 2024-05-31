@extends('doctor.template')

@section('title', 'Lista pacjentów')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Lista pacjentów</h5>
        @if (empty($patients))
            <div class="alert alert-danger mx-4" role="alert">
                Brak pacjentów do wyświetlenia.
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Adres zamieszkania</th>
                            <th>Numer telefonu</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
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
            </div>
        @endif
    </div>
@endsection
