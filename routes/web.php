<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\AdminController;
    use App\Http\Controllers\TestController;

    Route::get('/', [HomeController::class, 'index']);
    Route::get('/Home', [HomeController::class, 'redirect']);
    Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');

    Route::get('/add_doctor_view', [AdminController::class, 'addview']);
    Route::get('/show_doctor', [AdminController::class, 'show']);
    Route::get('/show_patient', [AdminController::class, 'showPatient']);

    Route::get('/add_patient', [AdminController::class, 'addpatient']);

//    Route::get('/get_specializations/{doctor_id}', [AdminController::class, 'getSpecializations']);


    Route::get('update_doctor/{id}', [AdminController::class, 'editt']);
    Route::post('save_doctor/{id}', [AdminController::class, 'saveDoctor'])->name('save_doctor');

    Route::delete('delete_doctor/{id}', [AdminController::class, 'deleteDoctor'])->name('delete_doctor');

    Route::get('update_patient/{id}', [AdminController::class, 'edittPatient']);
    Route::post('save_patient/{id}', [AdminController::class, 'savePatient'])->name('save_patient');

    Route::delete('delete_patient/{id}', [AdminController::class, 'deletePatient'])->name('delete_patient');


    Route::post('/upload_doctor', [AdminController::class, 'upload']);
    Route::post('/upload_patient', [AdminController::class, 'uploadPatient']);
    Route::get('/appoinment', [AdminController::class, 'add_appoinment']);
    Route::post('/upload_appoinment', [AdminController::class, 'u_appoinment']);
