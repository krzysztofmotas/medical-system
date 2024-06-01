@extends('patient.template')

@section('title', 'Recepty')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Recepty</h5>

        @if (empty($prescriptions))
            <div class="alert alert-danger mx-4" role="alert">
                Nie znaleziono żadnych recept przypisanych do Twojego konta.
            </div>
        @else
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Recepty</th>
                            <th>Imię i nazwisko lekarza</th>
                            <th>Data wystawienia</th>
                            <th>Data ważności</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($prescriptions as $prescription)
                            <tr>
                                <td>{{ $prescription['ID'] }}</td>
                                <td>{{ $prescription['DOCTOR_NAME'] }} {{ $prescription['DOCTOR_LAST_NAME'] }}</td>
                                <td>{{ formatTimestampToDate($prescription['START_DATE']) }}</td>
                                <td>{{ formatTimestampToDate($prescription['EXPIRATION_DATE']) }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalCenter{{ $prescription['ID'] }}">
                                        Więcej
                                    </button>

                                    <div class="modal fade" id="modalCenter{{ $prescription['ID'] }}" tabindex="-1"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">Szczegóły recepty</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Zamknij"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <strong>Kod recepty:</strong>
                                                            {{ $prescription['CODE'] }}<br>

                                                            <strong>Data wystawienia:</strong>
                                                            {{ formatTimestampToDate($prescription['START_DATE']) }}<br>

                                                            <strong>Data ważności:</strong>
                                                            {{ formatTimestampToDate($prescription['EXPIRATION_DATE']) }}<br><br>

                                                            <strong>Wystawił:</strong>
                                                            {{ $prescription['DOCTOR_NAME'] }}
                                                            {{ $prescription['DOCTOR_LAST_NAME'] }}<br>

                                                            <strong>Specjalizacja:</strong>
                                                            {{ $prescription['DOCTOR_SPECIALIZATION'] }}
                                                        </div>
                                                        <div class="col">
                                                            <img width="140px" height="140px" src="images/qr.png"
                                                                class="img-fluid border rounded float-end" alt="Kod QR">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5>Leki i dawkowanie:</h5>
                                                            <ul class="list-group">
                                                                @foreach ($prescription['medicines'] as $medicine)
                                                                    <li class="list-group-item">
                                                                        <strong>Nazwa:</strong> {{ $medicine['MEDICINE_NAME'] }}<br>
                                                                        <strong>Dawkowanie:</strong> {{ $medicine['DOSAGE'] }}<br>
                                                                        <strong>Odpłatność:</strong> {{ $medicine['PAYMENT'] }}%<br>
                                                                        <strong>Cena:</strong> {{ $medicine['MEDICINE_PRICE'] }} zł
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
