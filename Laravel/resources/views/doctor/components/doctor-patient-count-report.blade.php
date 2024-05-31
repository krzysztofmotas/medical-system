@extends('doctor.template')

@section('title', 'Doctor Patient Count Report')

@section('component-content')
    <div class="card">
        <h5 class="card-header">Doctor Patient Count Report</h5>
        <div class="card-body">
            @if (!empty($report))
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Specialization</th>
                            <th>Phone Number</th>
                            <th>Patient Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report as $doctor)
                            <tr>
                                <td>{{ $doctor['ID'] }}</td>
                                <td>{{ $doctor['NAME'] }}</td>
                                <td>{{ $doctor['LAST_NAME'] }}</td>
                                <td>{{ $doctor['SPECIALIZATION'] }}</td>
                                <td>{{ $doctor['PHONE_NUMBER'] }}</td>
                                <td>{{ $doctor['PATIENT_COUNT'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger" role="alert">
                    No data available.
                </div>
            @endif
        </div>
    </div>
@endsection
