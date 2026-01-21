<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('pasien.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'namaPasien' => 'required|string|min:3|max:255',
            'jenisKelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'tanggalLahir' => 'required|date|before:today|after:1900-01-01',
            'wa' => 'required|numeric|min:10|max:15|regex:/^(\+62|62|0)8[1-9][0-9]{6,11}$/',
            'alamat' => 'required|string|min:5|max:500',
            'jam' => 'required|date_format:H:i|regex:/^([0-1][0-9]|2[0-3]):[0-5][0-9]$/',
            'status' => ['required', Rule::in(['active', 'nonactive'])],
        ]);

        return $validated;
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
