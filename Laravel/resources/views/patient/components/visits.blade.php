@extends('patient.template')

@section('title', 'Wizyty')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Wizyty</h5>

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
                            <th>Imię i nazwisko lekarza</th>
                            <th>Specjalizacja</th>
                            <th>Data rozpoczęcia</th>
                            <th colspan="2">Data zakończenia</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($visits as $visit)
                            <tr>
                                <td>{{ $visit['VISIT_ID'] }}</td>
                                <td>{{ $visit['DOCTOR_NAME'] }} {{ $visit['DOCTOR_LAST_NAME'] }}</td>
                                <td>{{ $visit['DOCTOR_SPECIALIZATION'] }}</td>
                                <td>{{ formatTimestampToDate($visit['VISIT_START_DATE']) }}</td>
                                <td>{{ formatTimestampToDate($visit['VISIT_END_DATE']) }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalCenter{{ $visit['VISIT_ID'] }}">
                                        Więcej
                                    </button>

                                    <div class="modal fade" id="modalCenter{{ $visit['VISIT_ID'] }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Szczegóły wizyty</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Zamknij"></button>
                                                </div>
                                                <div class="modal-body pt-2">
                                                    <strong>Lekarz:</strong>
                                                    {{ $visit['DOCTOR_NAME'] }}
                                                    {{ $visit['DOCTOR_LAST_NAME'] }}<br>

                                                    <strong>Specjalizacja:</strong>
                                                    {{ $visit['DOCTOR_SPECIALIZATION'] }}<br><br>

                                                    <strong>Data rozpoczęcia:</strong>
                                                    {{ formatTimestampToDate($visit['VISIT_START_DATE']) }}<br>

                                                    <strong>Data zakończenia:</strong>
                                                    {{ formatTimestampToDate($visit['VISIT_END_DATE']) }}<br><br>

                                                    <strong>Powód wizyty:</strong>
                                                    {{ $visit['VISIT_REASON'] }}<br>

                                                    <strong>Diagnoza:</strong>
                                                    {{ $visit['VISIT_DIAGNOSIS'] }}<br>

                                                    <strong>Sposób leczenia:</strong>
                                                    {{ $visit['VISIT_TREATMENT_METHOD'] }}<br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
