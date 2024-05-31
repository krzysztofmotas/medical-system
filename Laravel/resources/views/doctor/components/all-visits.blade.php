@extends('doctor.template')

@section('title', 'Wizyty')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Wszystkie wizyty</h5>
        <div class="card-body">
            @if (!empty($visits))
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Wizyty</th>
                            <th>ID Pacjenta</th>
                            <th>ID Doktora</th>
                            <th>Przyczyna</th>
                            <th>Początek wizyty</th>
                            <th>Koniec wizyty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visits as $visit)
                            <tr>
                                <td>{{ $visit['ID'] }}</td>
                                <td>{{ $visit['PATIENT_ID'] }}</td>
                                <td>{{ $visit['DOCTOR_ID'] }}</td>
                                <td>{{ $visit['REASON'] }}</td>
                                <td>{{ $visit['START_DATE'] }}</td>
                                <td>{{ $visit['END_DATE'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger" role="alert">
                    No visits found.
                </div>
            @endif
        </div>
    </div>
@endsection
