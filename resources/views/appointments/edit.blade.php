@extends('layouts.app')
@section('title', 'Edit Appointment')
@section('content')
    <form method="POST" action="{{ route('appointments.update', $appointment->id) }}" class="row g-3 needs-validation">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer ID</label>
            <input type="text" value="{{ $appointment->id }}" class="form-control mb-2" readonly>
        </div>
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer</label>
            <select name="customer_id" class="form-control mb-2" id="customer_id">
                @foreach ($customers as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $appointment->customer_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="service_id" class="form-label">Customer</label>
            <select name="service_id" class="form-control mb-2" id="service_id">
                @foreach ($services as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $appointment->service_id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="appointment_time" class="form-label">appointment_time</label>
            <input type="datetime-local" name="appointment_time"
                value="{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('Y-m-d\TH:i') }}"
                class="form-control mb-2" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Customer</label>
            <select name="status" class="form-control mb-2" id="status">
                <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">UPDATE</button>
            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection