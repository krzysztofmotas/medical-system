@extends('doctor.template')

@section('title', 'Wizyty')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Wizyty</h5>

        <form method="get" class="mx-4 mb-3">
            <div class="row">
                <div class="col-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" id="last_name" name="last_name" required
                            placeholder="Podaj nazwisko pacjenta">
                        <button type="submit" class="btn btn-primary">Szukaj</button>
                    </div>
                </div>
            </div>
        </form>

        @if (empty($visits))
            <div class="alert alert-danger mx-4" role="alert">
                Nie znaleziono żadnych wizyt.
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Wizyty</th>
                            <th>Imię i nazwisko pacjenta</th>
                            <th>Imię i nazwisko lekarza</th>
                            <th>Powód</th>
                            <th>Początek wizyty</th>
                            <th>Koniec wizyty</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($visits as $visit)
                            <tr>
                                <td>{{ $visit['ID'] }}</td>
                                <td>{{ $visit['PATIENT_NAME'] }} {{ $visit['PATIENT_LAST_NAME'] }}</td>
                                <td>{{ $visit['DOCTOR_NAME'] }} {{ $visit['DOCTOR_LAST_NAME'] }}</td>
                                <td>{{ $visit['REASON'] }}</td>
                                <td>{{ formatTimestampToDate($visit['START_DATE']) }}</td>
                                <td>{{ formatTimestampToDate($visit['END_DATE']) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
