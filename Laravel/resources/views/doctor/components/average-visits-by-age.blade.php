@extends('doctor.template')

@section('title', 'Średnia wizyt według wieku')

@section('component-content')
<div class="card">
    <h5 class="card-header">Średnia wizyt według wieku</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Wiek</th>
                    <th>Ilość wizyt</th>
                    <th>Średnia wizyt</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($visitsByAge as $visit)
                    <tr>
                        <td>{{ $visit['AGE'] }}</td>
                        <td>{{ $visit['VISITS_COUNT'] }}</td>
                        <td>{{ $visit['AVERAGE_VISITS'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Brak danych do wyświetlenia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
