<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){
        $appointments = Appointment::with(['doctor', 'doctor.user', 'user', 'service'])->get();
        $doctor = Doctor::with(['user', 'services'])->get();
        $user = User::all();
        return inertia('Appointment/Index', [
            'appointments' => $appointments,
            'doctor' => $doctor,
            'user' => $user
        ]);
    }

    public function create(){
        $doctors = Doctor::with(['services', 'user'])->get();
        $services = Service::all();
        $users = User::all();
        return inertia('Appointment/Create', ['doctors' =>$doctors, 'services'=>$services, 'users'=>$users]);
    }

    public function store(Request $request){
        $fields = $request->validate([
            'user_id' => 'required',
            'doc_id' => 'required',
            'service_id' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'reason' => 'required',
        ]);

        Appointment::create($fields);
        return redirect()->route('appointment.index')->with('success', 'Appointment created successfully.');
    }

}
