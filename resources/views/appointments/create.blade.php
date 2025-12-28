@extends('layouts.app')
@section('title', 'Create Appointment')
@section('content')
    <form method="POST" action="{{ route('appointments.store') }}" class="row g-3 needs-validation">
        @csrf
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select name="customer_id" class="form-control mb-2" id="customer_id">
                <option>Choose a Customer</option>
                @foreach ($customers as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="service_id" class="form-label">Customer</label>
            <select name="service_id" class="form-control mb-2" id="service_id">
                <option>Choose a Service</option>
                @foreach ($services as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="appointment_time" class="form-label">appointment_time</label>
            <input type="datetime-local" name="appointment_time" id="appointment_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Customer</label>
            <select name="status" class="form-control mb-2" id="status">
                <option>Choose a Status</option>
                <option value="pending">pending</option>
                <option value="confirmed">confirmed</option>
                <option value="cancelled">cancelled</option>
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection