@extends('doctor.template')

@section('title', 'Lista leków')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Lista leków</h5>

        <form action="{{ route('doctor.medicines.store') }}" method="post" class="mx-4 mb-3">
            @csrf
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Nazwa leku" required
                            maxlength="100" value="{{ old('name') }}">
                        <input type="number" name="price" class="form-control" placeholder="Cena" min="1" required
                            value="{{ old('price') }}">
                        <button type="submit" class="btn btn-primary">Dodaj nowy lek</button>
                    </div>
                </div>

                <div class="col-auto">
                    Średnia cena leku: <strong>{{ number_format($averageMedicinePrice, 2) }} zł</strong>
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
                            <th>ID</th>
                            <th>Nazwa leku</th>
                            <th>Cena</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($medicines as $medicine)
                            <tr>
                                <td>{{ $medicine['ID'] }}</td>
                                <td>{{ $medicine['NAME'] }}</td>
                                <td>{{ $medicine['PRICE'] }} zł</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
