@extends('doctor.template')

@section('title', 'Średni czas trwania wizyty')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Średni czas trwania wizyty</h5>

        @if (empty($visitsData))
            <div class="alert alert-danger mx-4" role="alert">
                Brak danych do wyświetlenia.
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Lp.</th>
                            <th>Imię i nazwisko lekarza</th>
                            <th>Średni czas trwania wizyty</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($visitsData as $index => $data)
                            @if ($data['AVERAGE_TIME'])
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $data['NAME'] }} {{ $data['LAST_NAME'] }}</td>
                                    <td>{{ formatSecondsToTime($data['AVERAGE_TIME']) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
