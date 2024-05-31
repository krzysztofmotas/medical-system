@extends('doctor.template')

@section('title', 'Wyszukaj wizyty')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Wyszukaj wizyty na podstawie nazwiska</h5>
        <div class="card-body">
            <form method="GET" action="{{ route('doctor.visits.search') }}">
                @csrf
                <div class="input-group w-25">
                    <input type="text" class="form-control" id="last_name" name="last_name" required placeholder="Podaj nazwisko">
                    <button type="submit" class="btn btn-primary">Szukaj</button>
                </div>
            </form>

            @if (!empty($visits))
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Wizyty</th>
                            <th>Imię pacjenta</th>
                            <th>Nazwisko pacjenta</th>
                            <th>Lekarz</th>
                            <th>Przyczyna</th>
                            <th>Początek wizyty</th>
                            <th>Koniec wizyty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visits as $visit)
                            <tr>
                                <td>{{ $visit['ID'] }}</td>
                                <td>{{ $visit['PATIENT_NAME'] }}</td>
                                <td>{{ $visit['PATIENT_LAST_NAME'] }}</td>
                                <td>{{ $visit['DOCTOR_NAME'] }} {{ $visit['DOCTOR_LAST_NAME'] }}</td>
                                <td>{{ $visit['REASON'] }}</td>
                                <td>{{ $visit['START_DATE'] }}</td>
                                <td>{{ $visit['END_DATE'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @elseif (isset($visits))
                <div class="alert alert-danger" role="alert">
                    Brak wizyt dla podanego nazwiska.
                </div>
            @endif
        </div>
    </div>
@endsection
