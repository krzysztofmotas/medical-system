@extends('patient.template')

@section('title', 'Ustawienia')

@section('component-content')
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <form class="mb-3" action="{{ route('patient.settings.update') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Imię</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Podaj swoje imię" value="{{ old('name', $patient->name) }}" autofocus required />
                            @error('name')
                                <div class="form-text text-warning">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Nazwisko</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                placeholder="Podaj swoje nazwisko" value="{{ old('last_name', $patient->last_name) }}" required />

                            @error('last_name')
                                <div class="form-text text-warning">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label">Płeć</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="Mężczyzna" {{ old('gender', $patient->gender) == 'Mężczyzna' ? 'selected' : '' }}>Mężczyzna</option>
                                <option value="Kobieta" {{ old('gender', $patient->gender) == 'Kobieta' ? 'selected' : '' }}>Kobieta</option>
                                <option value="Inna" {{ old('gender', $patient->gender) == 'Inna' ? 'selected' : '' }}>Inna</option>
                            </select>
                            @error('gender')
                                <div class="form-text text-warning">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Adres</label>
                            <input value="{{ old('address', $patient->address) }}" type="text" class="form-control" id="address" name="address" placeholder="Podaj swój adres" required />
                            @error('address')
                                <div class="form-text text-warning">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Numer telefonu</label>
                            <input value="{{ old('phone_number', $patient->phone_number) }}" type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Podaj swój numer telefonu" required />
                            @error('phone_number')
                                <div class="form-text text-warning">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Data urodzenia</label>
                            <input value="{{ old('date_of_birth', date('Y-m-d', strtotime($patient->date_of_birth))) }}" type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Podaj swoją datę urodzenia" required />
                            @error('date_of_birth')
                                <div class="form-text text-warning">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Zaktualizuj dane</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
