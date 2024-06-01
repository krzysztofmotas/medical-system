@extends('doctor.template')

@section('title', 'Zarządzanie wizytami')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Zarządzanie wizytami</h5>
        @if (empty($visits))
            <div class="alert alert-danger mx-4" role="alert">
                Nie znaleziono żadnych wizyt.
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imię pacjenta</th>
                            <th>Nazwisko pacjenta</th>
                            <th>Powód</th>
                            <th>Data rozpoczęcia wizyty</th>
                            <th>Data końca wizyty</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($visits as $visit)
                            <tr>
                                <td>{{ $visit['VISIT_ID'] }}</td>
                                <td>{{ $visit['PATIENT_NAME'] }} </td>
                                <td>{{ $visit['PATIENT_LAST_NAME'] }}</td>
                                <td>{{ $visit['REASON'] }}</td>
                                <td>{{ formatTimestampToDate($visit['START_DATE']) }}</td>
                                <td>{{ formatTimestampToDate($visit['END_DATE']) }}</td>
                                <td>
                                    <a href="{{ route('doctor.edit.visit', $visit['VISIT_ID']) }}"
                                        class="btn btn-primary">Edycja</a>
                                </td>
                                <td>
                                    <form action="{{ route('doctor.delete.visit', $visit['VISIT_ID']) }}" method="post"
                                        onsubmit="return confirm('Czy na pewno chcesz usunąć tę wizytę?');">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Usunięcie</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
