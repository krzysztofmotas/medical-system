@extends('doctor.template')

@section('title', 'Popularność specjalizacji')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Popularność specjalizacji na podstawie liczby wizyt</h5>
        @if (empty($popularityData))
            <div class="alert alert-danger mx-4" role="alert">
                Brak wyników do wyświetlenia.
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Lp.</th>
                            <th>Nazwa specjalizacji</th>
                            <th>Całkowita liczba wizyt</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($popularityData as $index => $specialization)
                            <tr>
                                <td>{{ $index }}</td>
                                <td>{{ $specialization['SPECIALIZATION'] }}</td>
                                <td>{{ $specialization['VISIT_COUNT'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
