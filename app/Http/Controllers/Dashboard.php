<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $data = [
            'jumlahPasien' => Patient::count(),
            'pasienAktif' => Patient::where('status', 'active')->count(),
            'pasienNonaktif' => Patient::where('status', 'nonactive')->count()
        ];

        return view('dashboard', $data);
    }
}
