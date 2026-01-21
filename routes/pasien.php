<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::resource('pasien', PatientController::class)->middleware('AMR');
