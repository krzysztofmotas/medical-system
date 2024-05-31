@extends('doctor.template')

@section('title', 'Drogie leki')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Lista leków, których cena jest wyższa od średniej ceny leku</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nazwa</th>
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
    </div>
@endsection
