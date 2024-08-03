<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\NutritionalValueController;
use App\Http\Controllers\ProfitabilityAnalysisController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\InventoryItemController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\FeedIngredientController;
use App\Http\Controllers\ManagerController;

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
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// User routes
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/login', function () {
    return view('users.login');
})->name('users.login');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


// Protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Dashboard route
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard.index');

    // Farm routes
    Route::resource('farms', FarmController::class);

    // Animal routes
    Route::resource('animals', AnimalController::class);

    // Field routes
    Route::resource('fields', FieldController::class);

    // Crop routes
    Route::resource('fields.crops', CropController::class);

    // Feed ingredient routes
    Route::resource('feed_ingredients', FeedIngredientController::class);

    // Expense routes
    Route::resource('expenses', ExpenseController::class);

    // Income routes
    Route::resource('incomes', IncomeController::class);

    // Manager routes
    Route::resource('managers', ManagerController::class);

    // Nutritional value routes
    Route::get('feed_ingredients/{feedIngredient}/nutritional_values', [NutritionalValueController::class, 'index'])->name('nutritional_values.index');
    Route::get('feed_ingredients/{feedIngredient}/nutritional_values/create', [NutritionalValueController::class, 'create'])->name('nutritional_values.create');
    Route::post('feed_ingredients/{feedIngredient}/nutritional_values', [NutritionalValueController::class, 'store'])->name('nutritional_values.store');
    Route::get('nutritional_values/{nutritionalValue}/edit', [NutritionalValueController::class, 'edit'])->name('nutritional_values.edit');
    Route::put('nutritional_values/{nutritionalValue}', [NutritionalValueController::class, 'update'])->name('nutritional_values.update');
    Route::delete('nutritional_values/{nutritionalValue}', [NutritionalValueController::class, 'destroy'])->name('nutritional_values.destroy');

    // Report routes
    Route::get('reports', [ReportController::class,'index'])->name('reports.index');
    Route::get('reports/download-profit-analysis-csv', [ReportController::class,'downloadCsvProfitReport'])->name('reports.download-profit-analysis-csv');
    Route::get('reports/download-profit-analysis-pdf', [ReportController::class,'downloadPdfProfitReport'])->name('reports.download-profit-analysis-pdf');
    Route::get('reports/download-expenses-pdf', [ReportController::class,'downloadExpensesPdf'])->name('reports.download-expenses-pdf');
    Route::get('reports/download-incomes-pdf', [ReportController::class,'downloadIncomesPdf'])->name('reports.download-incomes-pdf');

    // Profitability analysis routes
    Route::resource('profitability_analyses', ProfitabilityAnalysisController::class);

    // Worker routes
    Route::resource('workers', WorkerController::class);

    // Inventory item routes
    Route::resource('inventory_items', InventoryItemController::class);
});
