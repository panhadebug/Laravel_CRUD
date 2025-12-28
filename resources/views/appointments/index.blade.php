@extends('layouts.app')
@section('title', 'Appointment List')
@section('content')
    <div class="my-3">
        <a href="{{ route('appointments.create') }}" class="btn btn-primary">Create New</a>
    </div>
    <table class="table table-hover table-dark">
        <thead class="table-active text-dark">
            <th>ID</th>
            <th>customer_id</th>
            <th>service_id</th>
            <th>appointment_time</th>
            <th>status</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($appointments as $item)
                <tr>
                    <td class="col-1">{{ $item->id }}</td>
                    <td>{{ $item->customer->name }}</td>
                    <td>{{ $item->service->name }}</td>
                    <td>{{ $item->appointment_time }}</td>
                    <td>
                        {{ $item->status }}
                    </td>
                    <td class="col-3">
                        <a href="{{ route('appointments.edit', parameters: $item->id) }}" class="btn btn-info">Edit</a>
                        <form method="POST" action="{{ route('appointments.destroy', $item->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $appointments->links('pagination::bootstrap-5') }}
@endsection