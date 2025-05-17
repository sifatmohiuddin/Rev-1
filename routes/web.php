<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PlanAssignController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\AuthController;

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



Route::get('/', [HomeController::class, 'index']);


Route::get('/membership', [MembershipController::class, 'index'])->name('membership.index');

Route::post('/membership', [MembershipController::class, 'store'])->name('membership.store');

Route::get('/members', [MembershipController::class, 'show'])->name('members.index');

Route::get('/members', [MembershipController::class, 'show'])->name('members.show');

Route::get('/details', [MembershipController::class, 'detail'])->name('members.detail');

Route::get('/members/{id}/edit', [MembershipController::class, 'edit'])->name('members.edit');

// Update the member info in DB
Route::put('/members/{id}', [MembershipController::class, 'update'])->name('members.update');




Route::get('/plans/create', [PlanController::class, 'create'])->name('plans.create');
Route::post('/plans', [PlanController::class, 'store'])->name('plans.store');

Route::get('/members/{member_id}', [MembershipController::class, 'detail'])->name('members.detail');


// routes/web.php
Route::post('/members/reset-membership/{member}', [MembershipController::class, 'resetMembership'])->name('members.resetMembership');


Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');


Route::get('/plans/{id}', [PlanController::class, 'show'])->name('plans.show');

Route::get('/plans/{id}/edit', [PlanController::class, 'edit'])->name('plans.edit');
Route::put('/plans/{id}', [PlanController::class, 'update'])->name('plans.update');


Route::get('/plans/download/{membership_id}', [PlanController::class, 'downloadPDF'])->name('plans.download.pdf');


Route::get('/pdf/form', [PlanController::class, 'showForm'])->name('pdf.form');
Route::post('/pdf/generate', [PlanController::class, 'generatePDF'])->name('pdf.generate');
