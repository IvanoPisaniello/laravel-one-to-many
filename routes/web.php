<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProjectController as GuestProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('guests.welcome');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get("/projects", [GuestProjectController::class, "index"])->name("projects.index");


Route::middleware(['auth', 'verified'])->prefix("admin")->name("admin.")->group(function () {
    // create

    Route::get("/projects/create", [ProjectController::class, "create"])->name("projects.create");
    Route::post("/projects", [ProjectController::class, "store"])->name("projects.store");


    Route::get("/projects/{slug}/edit", [ProjectController::class, "edit"])->name("projects.edit");
    Route::put("/projects/{slug}", [ProjectController::class, "update"])->name("projects.update");


    // read
    Route::get("/projects", [ProjectController::class, "index"])->name("projects.index");
    Route::get("/projects/{project}", [ProjectController::class, "show"])->name("projects.show");

    Route::delete("/projects/{slug}", [ProjectController::class, "destroy"])->name("projects.destroy");
});




Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
});

require __DIR__ . '/auth.php';
