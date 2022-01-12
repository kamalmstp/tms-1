<?php

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
use App\Http\Controllers\BusController;
use App\Http\Controllers\CollectionPointController;
use App\Http\Controllers\AmmountController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\CashCollectionController;
use App\Http\Controllers\DataGetController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\PolicePaymentMainController;
use App\Http\Controllers\PolicePaymentSubController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\TotalCashController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Back View View
|--------------------------------------------------------------------------
 */
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard')->middleware('auth');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/all-ammount/{id}', [DataGetController::class, 'ammount']);
    Route::get('/police-payment/{id}', [DataGetController::class, 'policemain']);
    Route::get('/police-payment-sub/{id}', [DataGetController::class, 'policesub']);

    $date = (date('Y-m-d'));
    Route::get('/bus-list/{id}/{date}', [DataGetController::class, 'buses']);
    Route::get('/trip-bus-list/{id}/{date}', [DataGetController::class, 'tripbuses']);


    Route::get('/dsammount/{date}', [TotalCashController::class, 'dsammount']);
    Route::get('/saydabadammount/{date}', [TotalCashController::class, 'saydabadammount']);
    Route::get('/gpammount/{date}', [TotalCashController::class, 'gpammount']);

    Route::group(['prefix' => 'bus'], function () {
        Route::get('/list', [BusController::class, 'index'])->name('bus.list');
        Route::get('create', [BusController::class, 'create'])->name('bus.create');
        Route::post('store', [BusController::class, 'store'])->name('bus.store');
        Route::get('status/{id}', [BusController::class, 'status'])->name('bus.status');
        Route::get('edit/{id}', [BusController::class, 'edit'])->name('bus.edit');
        Route::post('update/{id}', [BusController::class, 'update'])->name('bus.update');
        Route::delete('delete/{id}', [BusController::class, 'destroy'])->name('bus.delete');
    });
    Route::group(['prefix' => 'collection-point'], function () {
        Route::get('/list', [CollectionPointController::class, 'index'])->name('collection-point.list');
        Route::get('create', [CollectionPointController::class, 'create'])->name('collection-point.create');
        Route::post('store', [CollectionPointController::class, 'store'])->name('collection-point.store');
        Route::get('status/{id}', [CollectionPointController::class, 'status'])->name('collection-point.status');
        Route::get('edit/{id}', [CollectionPointController::class, 'edit'])->name('collection-point.edit');
        Route::post('update/{id}', [CollectionPointController::class, 'update'])->name('collection-point.update');
        Route::delete('delete/{id}', [CollectionPointController::class, 'destroy'])->name('collection-point.delete');
    });
    Route::group(['prefix' => 'ammount'], function () {
        Route::get('/list', [AmmountController::class, 'index'])->name('ammount.list');
        Route::get('create', [AmmountController::class, 'create'])->name('ammount.create');
        Route::post('store', [AmmountController::class, 'store'])->name('ammount.store');
        Route::get('status/{id}', [AmmountController::class, 'status'])->name('ammount.status');
        Route::get('edit/{id}', [AmmountController::class, 'edit'])->name('ammount.edit');
        Route::post('update/{id}', [AmmountController::class, 'update'])->name('ammount.update');
        Route::delete('delete/{id}', [AmmountController::class, 'destroy'])->name('ammount.delete');
    });
    Route::group(['prefix' => 'trip'], function () {
        Route::get('/list', [TripController::class, 'index'])->name('trip.list');
        Route::get('create', [TripController::class, 'create'])->name('trip.create');
        Route::post('store', [TripController::class, 'store'])->name('trip.store');
        Route::get('status/{id}', [TripController::class, 'status'])->name('trip.status');
        Route::get('edit/{id}', [TripController::class, 'edit'])->name('trip.edit');
        Route::post('update/{id}', [TripController::class, 'update'])->name('trip.update');
        Route::delete('delete/{id}', [TripController::class, 'destroy'])->name('trip.delete');
    });
    Route::group(['prefix' => 'cash-collection'], function () {
        Route::get('/list', [CashCollectionController::class, 'index'])->name('cash-collection.list');
        Route::get('create', [CashCollectionController::class, 'create'])->name('cash-collection.create');
        Route::post('store', [CashCollectionController::class, 'store'])->name('cash-collection.store');
        Route::get('/info/{id}', [CashCollectionController::class, 'singleData'])->name('cash-collection.info');
    });

    Route::group(['prefix' => 'report'], function () {
        //without cas buses find
        Route::get('/without-cash-collection', [CashCollectionController::class, 'withOutCash'])->name('cash-collection.without-cash-collection');
        Route::get('/wthout-collection-bus-list/{date}', [CashCollectionController::class, 'busesList']);
        //bus listed
        Route::get('/cash-collection', [ReportController::class, 'cashCollection'])->name('report.cash-collection');
        Route::get('/cash-collection-bus-list', [ReportController::class, 'busesList'])->name('report.cash-collection-bus');
        //expense
        Route::get('/expense', [ReportController::class, 'expense'])->name('report.expense');
        Route::get('/expense-list', [ReportController::class, 'expenseList'])->name('report.expense-list');

        //expense
        Route::get('/total-cash', [ReportController::class, 'totalCachReport'])->name('report.total-cash');
        Route::get('/total-cash-list', [ReportController::class, 'totalCashReportList'])->name('report.total-cash-list');
    });


    Route::group(['prefix' => 'user-type'], function () {
        Route::get('/list', [UserTypeController::class, 'index'])->name('user-type.list');
        Route::get('create', [UserTypeController::class, 'create'])->name('user-type.create');
        Route::post('store', [UserTypeController::class, 'store'])->name('user-type.store');
        Route::get('status/{id}', [UserTypeController::class, 'status'])->name('user-type.status');
        Route::get('edit/{id}', [UserTypeController::class, 'edit'])->name('user-type.edit');
        Route::post('update/{id}', [UserTypeController::class, 'update'])->name('user-type.update');
        Route::delete('delete/{id}', [UserTypeController::class, 'destroy'])->name('user-type.delete');
    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('/list', [MainUserController::class, 'index'])->name('user.list');
        Route::get('create', [MainUserController::class, 'create'])->name('user.create');
        Route::post('store', [MainUserController::class, 'store'])->name('user.store');
        Route::get('status/{id}', [MainUserController::class, 'status'])->name('user.status');
        Route::get('edit/{id}', [MainUserController::class, 'edit'])->name('user.edit');
        Route::post('update/{id}', [MainUserController::class, 'update'])->name('user.update');
        Route::delete('delete/{id}', [MainUserController::class, 'destroy'])->name('user.delete');
    });
    Route::group(['prefix' => 'zone'], function () {
        Route::get('/list', [ZoneController::class, 'index'])->name('zone.list');
        Route::get('create', [ZoneController::class, 'create'])->name('zone.create');
        Route::post('store', [ZoneController::class, 'store'])->name('zone.store');
        Route::get('edit/{id}', [ZoneController::class, 'edit'])->name('zone.edit');
        Route::post('update/{id}', [ZoneController::class, 'update'])->name('zone.update');
        Route::delete('delete/{id}', [ZoneController::class, 'destroy'])->name('zone.delete');
    });
    Route::group(['prefix' => 'expense-category'], function () {
        Route::get('/list', [ExpenseCategoryController::class, 'index'])->name('expense-category.list');
        Route::get('create', [ExpenseCategoryController::class, 'create'])->name('expense-category.create');
        Route::post('store', [ExpenseCategoryController::class, 'store'])->name('expense-category.store');
        Route::get('status/{id}', [ExpenseCategoryController::class, 'status'])->name('expense-category.status');
        Route::get('edit/{id}', [ExpenseCategoryController::class, 'edit'])->name('expense-category.edit');
        Route::post('update/{id}', [ExpenseCategoryController::class, 'update'])->name('expense-category.update');
        Route::delete('delete/{id}', [ExpenseCategoryController::class, 'destroy'])->name('expense-category.delete');
    });
    Route::group(['prefix' => 'police-payment-main-sector'], function () {
        Route::get('/list', [PolicePaymentMainController::class, 'index'])->name('ppmain.list');
        Route::get('create', [PolicePaymentMainController::class, 'create'])->name('ppmain.create');
        Route::post('store', [PolicePaymentMainController::class, 'store'])->name('ppmain.store');
        Route::get('edit/{id}', [PolicePaymentMainController::class, 'edit'])->name('ppmain.edit');
        Route::post('update/{id}', [PolicePaymentMainController::class, 'update'])->name('ppmain.update');
        Route::delete('delete/{id}', [PolicePaymentMainController::class, 'destroy'])->name('ppmain.delete');
    });
    Route::group(['prefix' => 'police-payment-sub-sector'], function () {
        Route::get('/list', [PolicePaymentSubController::class, 'index'])->name('ppsub.list');
        Route::get('create', [PolicePaymentSubController::class, 'create'])->name('ppsub.create');
        Route::post('store', [PolicePaymentSubController::class, 'store'])->name('ppsub.store');
        Route::get('edit/{id}', [PolicePaymentSubController::class, 'edit'])->name('ppsub.edit');
        Route::post('update/{id}', [PolicePaymentSubController::class, 'update'])->name('ppsub.update');
        Route::delete('delete/{id}', [PolicePaymentSubController::class, 'destroy'])->name('ppsub.delete');
    });
    Route::group(['prefix' => 'expense'], function () {
        Route::get('/list', [ExpenseController::class, 'index'])->name('expense.list');
        Route::get('create', [ExpenseController::class, 'create'])->name('expense.create');
        Route::post('store', [ExpenseController::class, 'store'])->name('expense.store');
    });
    Route::group(['prefix' => 'adjust-collection'], function () {
        Route::get('/list', [TotalCashController::class, 'index'])->name('adjust-collection.list');
        Route::get('create', [TotalCashController::class, 'create'])->name('adjust-collection.create');
        Route::post('store', [TotalCashController::class, 'store'])->name('adjust-collection.store');
    });
});
