<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DispensingController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MedCategoryController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MedTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TemporaryStockController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
    // return Inertia::render('Auth.Login');
});

// Route::post('/', [LoginController::class, 'login']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/category', [MedCategoryController::class, 'index'])->name('category.index');
    Route::put('/category/{medcategory}',[MedCategoryController::class, 'update']);
    Route::post('/category',[MedCategoryController::class, 'store']);
    Route::delete('/category/{medcategory}', [MedCategoryController::class, 'destroy']);

    Route::get('/type', [MedTypeController::class, 'index'])->name('type.index');
    Route::put('/type/{medtype}',[MedTypeController::class, 'update']);
    Route::post('/type',[MedTypeController::class, 'store']);
    Route::delete('/type/{medtype}', [MedTypeController::class, 'destroy']);

    Route::get('/medicine', [MedicineController::class, 'index'])->name('medicine.index');
    Route::put('/medicine/{medicine}',[MedicineController::class, 'update']);
    Route::post('/medicine',[MedicineController::class, 'store']);
    Route::delete('/medicine/{medicine}', [MedicineController::class, 'destroy']);

    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');

    Route::get('/stock/create', [StockController::class, 'create'])->name('inventory.create');

    Route::get('/stock',[StockController::class , 'index'])->name('stock.index');
    Route::post('/stock',[StockController::class, 'store'])->name('stock.create');
    Route::get('/stock/edit/{stock}', [StockController::class, 'edit']);
    Route::put('/stock/{stock}',[StockController::class, 'update']);
    Route::delete('/stock/{stock}', [StockController::class, 'destroy']);

    Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
    Route::get('/doctor',[DoctorController::class, 'index'])->name('doctor.index');
    Route::post('/doctor',[DoctorController::class, 'store'])->name('doctor.create');
    Route::get('/doctor/edit/{doctor}', [DoctorController::class, 'edit']);
    Route::put('/doctor/{doctor}',[DoctorController::class, 'update']);
    Route::delete('/doctor/{doctor}', [DoctorController::class, 'destroy']);
    Route::get('/doctor/show/{doctor}', [DoctorController::class, 'show']);
    Route::post('/doctor/{doctor}/activate', [DoctorController::class, 'activate'])->name('doctor.activate');
    Route::post('/doctor/{doctor}/deactivate', [DoctorController::class, 'deactivate'])->name('doctor.deactivate');

    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::get('/service',[ServiceController::class, 'index'])->name('service.index');
    Route::post('/service',[ServiceController::class, 'store'])->name('service.create');
    Route::get('/service/edit/{service}', [ServiceController::class, 'edit']);
    Route::put('/service/{service}',[ServiceController::class, 'update']);
    Route::delete('/service/{service}', [ServiceController::class, 'destroy']);

    Route::get('/dispense', [DispensingController::class, 'index'])->name('dispense.index');
    Route::put('/dispense/{dispense}',[DispensingController::class, 'update']);
    Route::post('/dispense',[DispensingController::class, 'store']);
    Route::delete('/dispense/{dispense}', [DispensingController::class, 'destroy']);

    Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::get('/appointment',[AppointmentController::class, 'index'])->name('appointment.index');
    Route::post('/appointment',[AppointmentController::class, 'store'])->name('appointment.create');
    Route::get('/appointment/edit/{appointment}', [AppointmentController::class, 'edit']);
    Route::put('/appointment/{appointment}',[AppointmentController::class, 'update']);
    Route::delete('/appointment/{appointment}', [AppointmentController::class, 'destroy']);
    Route::get('/api/doctor/{doctorId}/services',[AppointmentController::class, 'getDoctorServices']);

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user',[UserController::class, 'store'])->name('user.create');
    Route::delete('/user/{user}', [UserController::class, 'destroy']);
    Route::get('/user/show/{user}', [UserController::class, 'show']);
    Route::post('/user/{user}/activate', [UserController::class, 'activate'])->name('user.activate');
    Route::post('/user/{user}/deactivate', [UserController::class, 'deactivate'])->name('user.deactivate');
});


require __DIR__.'/auth.php';
