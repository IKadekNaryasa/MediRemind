<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::paginate(5);
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
            'namaPasien' => 'required|string|min:3|max:255|unique:patients,namaPasien',
            'jenisKelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'tanggalLahir' => 'required|date|before:today|after:1900-01-01',
            'wa' => 'required|numeric|min:10|unique:patients,wa',
            'alamat' => 'required|string|min:5|max:500',
            'jam' => 'required|date_format:H:i',
            'status' => ['required', Rule::in(['active', 'nonactive'])],
        ]);

        try {
            Patient::create($validated);
            return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan!');
        } catch (Exception $e) {
            return redirect()->route('pasoen.index')->withErrors(['errors' => 'Data pasien gagal ditambahkan!. Silakan coba lagi']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $pasien)
    {
        $validated = $request->validate([
            'namaPasien' => 'required|string|min:3|max:255|unique:patients,namaPasien' . $pasien->id,
            'jenisKelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
            'tanggalLahir' => 'required|date|before:today|after:1900-01-01',
            'wa' => 'required|numeric|min:10|unique:patients,wa' . $pasien->id,
            'alamat' => 'required|string|min:5|max:500',
            'jam' => 'required|date_format:H:i',
            'status' => ['required', Rule::in(['active', 'nonactive'])],
        ]);

        try {
            $pasien->update($validated);
            return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diubah!');
        } catch (Exception $e) {
            return back()->withErrors(['errors' => 'Data pasien gagal diubah!. Silakan coba lagi'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $pasien)
    {
        try {
            $pasien->delete();
            return redirect()->back()->with('success', 'Data pasien berhasil dihapus!');
        } catch (Exception $e) {
            return back()->withErrors(['errors' => 'Data pasien gagal dihapus!. Silakan coba lagi']);
        }
    }
}
