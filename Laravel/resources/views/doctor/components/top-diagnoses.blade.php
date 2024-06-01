@extends('doctor.template')

@section('title', 'Najczęstsze diagnozy')

@section('component-content')
<div class="card">
    <h5 class="card-header">Najczęstsze diagnozy</h5>
    <form method="GET" class="mx-4 mb-3" action="{{ route('doctor.top.diagnoses') }}">
        @csrf
        <div class="row">
            <div class="col-auto">
                <div class="input-group">
                    <input type="text" name="search_term" class="form-control" placeholder="Wyszukaj po diagnozie" value="{{ $searchTerm }}">
                    <button type="submit" class="btn btn-primary">Szukaj</button>
                </div>
            </div>
        </div>
    </form>
    @if (empty($diagnoses))
        <div class="alert alert-danger mx-4" role="alert">
            Nie znaleziono diagnoz.
        </div>
    @else
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Diagnoza</th>
                        <th>Ilość</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($diagnoses as $diagnosis)
                        <tr>
                            <td>{{ $diagnosis['DIAGNOSIS'] }}</td>
                            <td>{{ $diagnosis['DIAGNOSIS_COUNT'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection