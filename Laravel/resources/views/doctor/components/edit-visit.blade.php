@extends('doctor.template')

@section('title', 'Edytowanie wizyty')

@section('component-content')
    @error('error')
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Zamknij"></button>
        </div>
    @enderror

    <form id="visit-form" method="post" action="{{ route('doctor.update.visit', $visit['id']) }}">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Dane wizyty</h5>
                        <div class="mb-3">
                            <label for="first_name" class="form-label">Imię pacjenta</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                value="{{ $visit['patient_name'] }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Nazwisko pacjenta</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                value="{{ $visit['patient_last_name'] }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="reason" class="form-label">Powód wizyty</label>
                            <input type="text" class="form-control" id="reason" name="reason"
                                placeholder="Wprowadź powód wizyty" value="{{ old('reason', $visit['reason']) }}">
                            @error('reason')
                                <div class="form-text text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Data początku wizyty</label>
                            <input type="datetime-local" class="form-control" id="start_date" name="start_date"
                                value="{{ $visit['start_date'] }}">
                            @error('start_date')
                                <div class="form-text text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Data końca wizyty</label>
                            <input type="datetime-local" class="form-control" id="end_date" name="end_date"
                                value="{{ $visit['end_date'] }}">
                            @error('end_date')
                                <div class="form-text text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <input type="hidden" name="medicines" id="selectedMedicinesField" />
                <button class="btn btn-primary mb-3" type="submit">Edytuj wizytę</button>
            </div>

            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Dokumentacja</h5>
                        <div class="mb-3">
                            <label for="diagnosis" class="form-label">Diagnoza</label>
                            <textarea class="form-control" id="diagnosis" name="diagnosis" rows="3" placeholder="Wprowadź diagnozę">{{ old('diagnosis', $visit['diagnosis']) }}</textarea>
                            @error('diagnosis')
                                <div class="form-text text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="treatment_method" class="form-label">Metoda leczenia</label>
                            <textarea class="form-control" id="treatment_method" name="treatment_method" rows="3"
                                placeholder="Wprowadź metodę leczenia">{{ old('treatment_method', $visit['treatment_method']) }}</textarea>
                            @error('treatment_method')
                                <div class="form-text text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Recepta</h5>
                        @if (Session::has('medicines_errors'))
                            <div class="form-text text-warning">
                                <ul>
                                    @foreach (Session::get('medicines_errors') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="expiration_date" class="form-label">Data ważności recepty</label>
                            <input type="date" class="form-control" id="expiration_date" name="expiration_date"
                                value="{{ old('expiration_date', $prescriptionData['expiration_date']) }}">
                            <small class="form-text text-muted">Jeśli nie zmienisz tej daty, recepta będzie ważna przez
                                rok.</small>
                            @error('expiration_date')
                                <div class="form-text text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="medicine" class="form-label">Nazwa leku</label>
                            <select class="form-select" id="medicine">
                                <option selected disabled>Wybierz lek...</option>
                                @foreach ($medicines as $medicine)
                                    <option value="{{ $medicine['ID'] }}">{{ $medicine['NAME'] }}</option>
                                @endforeach
                            </select>
                            @error('medicines.*.id')
                                <div class="form-text text-warning">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dosage" class="form-label">Dawkowanie</label>
                            <input type="text" class="form-control" id="dosage" placeholder="Wprowadź dawkowanie">
                        </div>

                        <div class="mb-3">
                            <label for="payment" class="form-label">Odpłatność</label>
                            <input type="text" class="form-control" id="payment" placeholder="Wprowadź odpłatność">
                        </div>
                        <button type="button" class="btn btn-primary" id="addMedicineButton">Dodaj lek</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lista leków</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nazwa leku</th>
                                        <th scope="col">Dawkowanie</th>
                                        <th scope="col">Odpłatność</th>
                                        <th scope="col">Akcje</th>
                                    </tr>
                                </thead>
                                <tbody id="medicinesTableBody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@push('scripts')
    <script>
        // Tablica przechowująca wybrane leki
        var selectedMedicines = [];

        const hasMedicines = @json(is_array($medicinesData));
        if (hasMedicines) {
            const prescriptionMedicines = {!! json_encode($medicinesData) !!};
            console.log(prescriptionMedicines);

            if (prescriptionMedicines.length > 0) {
                // Umieszczenie danych leków w tablicy selectedMedicines
                prescriptionMedicines.forEach(function(medicine) {
                    selectedMedicines.push({
                        id: medicine.id, // id konkretnego przypisanego leku
                        medicine_id: medicine.medicine_id,
                        name: medicine.name,
                        dosage: medicine.dosage,
                        payment: medicine.payment
                    });
                });
            }

            refreshMedicinesTable();
        }

        // Funkcja obsługująca dodawanie leków
        function addMedicine() {
            var selectElement = document.getElementById("medicine");
            var selectedOption = selectElement.options[selectElement.selectedIndex];
            var dosageInput = document.getElementById("dosage").value;
            var paymentInput = document.getElementById("payment").value;

            // Sprawdzamy, czy lek został wybrany i czy pola dawkowania i odpłatności są wypełnione
            if (selectedOption.value !== "" && dosageInput !== "" && paymentInput !== "") {
                // Dodajemy wybrany lek do tablicy
                selectedMedicines.push({
                    id: '-',
                    medicine_id: selectedOption.value,
                    name: selectedOption.text,
                    dosage: dosageInput,
                    payment: paymentInput,
                    deleted: false
                });

                // Odświeżamy tabelę z wybranymi lekami
                refreshMedicinesTable();
            } else {
                alert("Proszę uzupełnić wszystkie pola.");
            }
        }

        // Funkcja odświeżająca tabelę z wybranymi lekami
        function refreshMedicinesTable() {
            var tableBody = document.getElementById("medicinesTableBody");
            tableBody.innerHTML = "";

            selectedMedicines.forEach(function(medicine) {
                if (!medicine.deleted) {
                    var row = tableBody.insertRow();
                    var cell1 = row.insertCell(0);
                    cell1.innerHTML = medicine.id;

                    var cell2 = row.insertCell(1);
                    cell2.innerHTML = medicine.name;

                    var cell3 = row.insertCell(2);
                    cell3.innerHTML = medicine.dosage;

                    var cell4 = row.insertCell(3);
                    cell4.innerHTML = medicine.payment;

                    var cell5 = row.insertCell(4);
                    var removeButton = document.createElement("button");
                    removeButton.innerHTML = "Usuń";
                    removeButton.classList.add("btn", "btn-danger");
                    removeButton.onclick = function() {
                        if (medicine.id !== '-') {
                            medicine.deleted = true;
                        } else {
                            selectedMedicines = selectedMedicines.filter(function(m) {
                                return m.id !== medicine.medicine_id;
                            });
                        }
                        refreshMedicinesTable();
                    };
                    cell5.appendChild(removeButton);

                    if (medicine.id === '-') {
                        row.classList.add("table-success");
                    }
                }
            });
        }
        document.getElementById("addMedicineButton").addEventListener("click", addMedicine);

        document.getElementById("visit-form").addEventListener("submit", function(event) {
            var selectedMedicinesJSON = JSON.stringify(selectedMedicines);
            document.getElementById("selectedMedicinesField").value = selectedMedicinesJSON;

            return true;
        });
    </script>
@endpush
