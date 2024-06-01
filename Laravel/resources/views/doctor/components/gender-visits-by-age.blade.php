@extends('doctor.template')

@section('title', 'Średnia liczba wizyt według wieku')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Średnia liczba wizyt według wieku</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Zakres wieku</th>
                        <th>Rozkład procentowy</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($visitsByAge as $item)
                        @if (!empty($item['data']))
                            <tr>
                                <td>{{ $item['range'] }}</td>
                                <td>
                                    @foreach ($item['data'] as $data)
                                        @if ($data->gender === 'Mężczyzna')
                                            Mężczyźni: {{ round($data->percentage, 1) }}%
                                        @else
                                            <br>
                                            Kobiety: {{ round($data->percentage, 1) }}%
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
