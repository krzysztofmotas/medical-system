@extends('doctor.template')

@section('title', 'Lista lekarzy')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Lista lekarzy</h5>

        <form method="get" class="mx-4 mb-3">
            <div class="row">
                <div class="col-auto">
                    <div class="input-group">
                        <input type="text" name="specialization" class="form-control"
                            placeholder="Wyszukaj po specjalizacji" value="{{ $specialization ?? '' }}">
                        <button type="submit" class="btn btn-primary">Szukaj</button>
                    </div>
                </div>
            </div>
        </form>

        @if (empty($doctors))
            <div class="alert alert-danger mx-4" role="alert">
                Brak lekarzy do wyświetlenia.
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Specjalizacja</th>
                            <th>Numer telefonu</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($doctors as $doctor)
                            <tr>
                                <td>{{ $doctor['ID'] }}</td>
                                <td>{{ $doctor['NAME'] }}</td>
                                <td>{{ $doctor['LAST_NAME'] }}</td>
                                <td>{{ $doctor['SPECIALIZATION'] }}</td>
                                <td>{{ $doctor['PHONE_NUMBER'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
