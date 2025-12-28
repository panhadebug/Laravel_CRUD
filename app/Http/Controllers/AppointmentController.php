<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['customer', 'service'])->paginate(5);
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $customers = Customer::orderBy('name')->get();
        $services = Service::orderBy('name')->get();
        return view(
            'appointments.create',
            compact('customers', 'services')
        );
    }

    public function store(Request $request)
    {
        Appointment::create($request->validate([
            // 'cid_fk' => 'required|exists:tbl_customer,cid',
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'appointment_time' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]));

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment created.');
    }

    public function edit(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $customers = Customer::orderBy('name')->get();
        $services = Service::orderBy('name')->get();
        return view(
            'appointments.edit',
            compact(['appointment', 'customers', 'services'])
        );
    }

    public function update(Request $request, string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->validate([
            // 'cid_fk' => 'required|exists:tbl_customer,cid',
            'customer_id' => 'required|exists:customers,id',
            'service_id' => 'required|exists:services,id',
            'appointment_time' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]));

        return redirect()->route('appointments.index')
            ->with('success', 'Appointment updated.');
    }

    public function destroy(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->route('appointments.index')
            ->with('success', 'Appointment deleted.');
    }
}
