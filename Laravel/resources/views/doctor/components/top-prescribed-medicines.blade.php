@extends('doctor.template')

@section('title', 'Najczęściej przypisywane leki')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Najczęściej przypisywane leki przez lekarza <strong>{{ $name }}
                {{ $lastName }}</strong></h5>

        <form method="get" class="mx-4 mb-3">
            @csrf
            <div class="row">
                <div class="col-auto">
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Podaj imię lekarza" required
                            maxlength="50">
                        <input type="text" name="last_name" class="form-control" placeholder="Podaj nazwisko lekarza"
                            required maxlength="50">

                        <button type="submit" class="btn btn-primary">Wyszukaj</button>
                    </div>
                </div>
            </div>
        </form>

        @if (empty($medicines))
            <div class="alert alert-danger mx-4" role="alert">
                Brak leków do wyświetlenia.
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Lp.</th>
                            <th>Nazwa leku</th>
                            <th>Całkowita liczba przypisań</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($medicines as $index => $medicine)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $medicine['MEDICINE_NAME'] }}</td>
                                <td>{{ $medicine['PRESCRIPTION_COUNT'] }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
