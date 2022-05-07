<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;




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


Route::middleware(['roleauth'])->group(function () {    

Route::get('/inventory-list', [InventoryController::class,'index']);
Route::get('/add-inventory', [InventoryController::class,'inventory']);
Route::post('/add-inventory', [InventoryController::class, 'add_inventory'])->name('add_inventory');
Route::get('/edit-inventory/{id}', [InventoryController::class,'edit_inventory']);
Route::post('/edit-inventory/{id}', [InventoryController::class, 'change_inventory'])->name('edit_inventory');

Route::get('/activites', [ActivityController::class, 'index']);
Route::post('/activites/attendance', [ActivityController::class, 'add_attendance'])->name('attendance');
Route::post('/activites/leave', [ActivityController::class, 'add_leave_request'])->name('leave');

Route::get('/request', [RequestController::class, 'index']);
Route::post('/request/approve/{id}', [RequestController::class, 'approve_request']);
Route::post('/request/reject/{id}', [RequestController::class, 'reject_request']);

Route::get('/sales-list', [SaleController::class, 'sale_list']);
Route::get('/add-sales', [SaleController::class, 'add_sale']);
Route::post('/add-sales', [SaleController::class, 'new_sale'])->name('add_sale');
Route::get('/edit-sale/{id}', [SaleController::class,'edit_sale']);
Route::post('/edit-sale/{id}', [SaleController::class, 'change_sale'])->name('edit_sale');

Route::get('/buyer-list', [BuyerController::class, 'buyer_list']);
Route::post('/buyer-list', [BuyerController::class, 'add_buyer']);
Route::get('/edit-buyer/{id}', [BuyerController::class,'edit_buyer']);
Route::post('/edit-buyer/{id}', [BuyerController::class, 'change_buyer'])->name('edit_buyer');
Route::post('/buyer-delete/{id}', [BuyerController::class, 'destroy']);

Route::get('/expense-list', [ExpenseController::class, 'expense_list']);
Route::get('/add-expense', [ExpenseController::class, 'add_expense']);
Route::post('/add-expense', [ExpenseController::class, 'new_expense'])->name('add_expense');
Route::get('/edit-expense/{id}', [ExpenseController::class,'edit_expense']);
Route::post('/edit-expense/{id}', [ExpenseController::class, 'change_expense'])->name('edit_expense');


Route::get('/report', [ReportController::class, 'index']);
Route::post('/report', [ReportController::class, 'generate_csv']);
Route::get('/pdf/{id}', [ReportController::class, 'generate_pdf']);

Route::get('/payroll-list', [PayrollController::class, 'payroll_list']);
Route::get('/add-payroll', [PayrollController::class, 'add_payroll']);
Route::post('/add-payroll', [PayrollController::class, 'new_payroll'])->name('add_payroll');
Route::get('/edit-payroll/{id}', [PayrollController::class,'edit_payroll']);
Route::post('/edit-payroll/{id}', [PayrollController::class, 'change_payroll'])->name('edit_payroll');
Route::post('/delete-payroll/{id}', [PayrollController::class, 'destroy']);



Route::get('/add-user',[UserController::class, 'create_user']);
Route::post('/add-user', [UserController::class, 'new_user']);
Route::get('/login', function () {return view('login');});
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::get('/user-list', [UserController::class, 'user_list'])->name('user-list');
Route::get('/user-edit/{id}',[UserController::class, 'user_update']);
Route::post('/user-edit/{id}',[UserController::class, 'user_modify']);
Route::post('/user-delete/{id}', [UserController::class, 'destroy']);

Route::get('/user-profile/{id}', [ProfileController::class,'edit_profile']);
Route::post('/user-profile/{id}', [ProfileController::class,'change_profile'])->name('edit_profile');

});
Route::get('/', [UserController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

