<?php

use App\Http\Controllers\PurchasingCostController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SalesTrendController;
use App\Http\Controllers\SalesCategoryDistributionController;
use App\Http\Controllers\CostSalesComparisonController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\ProfileExample;
use App\Http\Livewire\Transactions;
use App\Http\Livewire\Users;

use App\Http\Livewire\PurchasingTrend;
use App\Http\Livewire\CostByCategory;
use App\Http\Livewire\SalesTrend;
use App\Http\Livewire\TopSalesBreakdown;
use App\Http\Livewire\CostSalesComparison;

use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login');

Route::get('/register', Register::class)->name('register');

Route::get('/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('/404', Err404::class)->name('404');
Route::get('/500', Err500::class)->name('500');

Route::middleware('auth')->group(function () {
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/profile-example', ProfileExample::class)->name('profile-example');
    Route::get('/users', Users::class)->name('users');
    Route::get('/mondrian', Dashboard::class)->name('dashboard');
    // Route::get('/transactions', Transactions::class)->name('transactions');

    // Dashboard Category
    Route::get('/purchasing-trend', PurchasingTrend::class)->name('purchasing-trend');
    Route::get('/cost-by-category', CostByCategory::class)->name('cost-by-category');
    Route::get('/sales-trend', SalesTrend::class)->name('sales-trend');
    Route::get('/top-sales-breakdown', TopSalesBreakdown::class)->name('top-sales-breakdown');
    Route::get('/cost-sales-comparison', CostSalesComparison::class)->name('cost-vs-sales');
});
