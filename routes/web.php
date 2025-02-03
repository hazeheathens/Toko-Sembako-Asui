<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductKeluarController;
use App\Http\Controllers\ProductMasukController;
use App\Http\Controllers\UserController;

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

Route::get('/', [HomeController::class, 'showLogin']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('dashboard', [HomeController::class, 'dashboard']);

Route::middleware('auth')->group(function () {
    // Categories Routes
    Route::resource('categories', CategoryController::class);
    Route::get('/apiCategories', [CategoryController::class, 'apiCategories'])->name('api.categories');
    Route::get('/exportCategoriesAll', [CategoryController::class, 'exportCategoriesAll'])->name('exportPDF.categoriesAll');
    Route::get('/exportCategoriesAllExcel', [CategoryController::class, 'exportExcel'])->name('exportExcel.categoriesAll');

    // Customers Routes
    Route::resource('customers', CustomerController::class);
    Route::get('/apiCustomers', [CustomerController::class, 'apiCustomers'])->name('api.customers');
    Route::post('/importCustomers', [CustomerController::class, 'ImportExcel'])->name('import.customers');
    Route::get('/exportCustomersAll', [CustomerController::class, 'exportCustomersAll'])->name('exportPDF.customersAll');
    Route::get('/exportCustomersAllExcel', [CustomerController::class, 'exportExcel'])->name('exportExcel.customersAll');

    // Sales Routes
    Route::resource('sales', SaleController::class);
    Route::get('/apiSales', [SaleController::class, 'apiSales'])->name('api.sales');
    Route::post('/importSales', [SaleController::class, 'ImportExcel'])->name('import.sales');
    Route::get('/exportSalesAll', [SaleController::class, 'exportSalesAll'])->name('exportPDF.salesAll');
    Route::get('/exportSalesAllExcel', [SaleController::class, 'exportExcel'])->name('exportExcel.salesAll');

    // Suppliers Routes
    Route::resource('suppliers', SupplierController::class);
    Route::get('/apiSuppliers', [SupplierController::class, 'apiSuppliers'])->name('api.suppliers');
    Route::post('/importSuppliers', [SupplierController::class, 'ImportExcel'])->name('import.suppliers');
    Route::get('/exportSupplierssAll', [SupplierController::class, 'exportSuppliersAll'])->name('exportPDF.suppliersAll');
    Route::get('/exportSuppliersAllExcel', [SupplierController::class, 'exportExcel'])->name('exportExcel.suppliersAll');

    // Products Routes
    Route::resource('products', ProductController::class);
    Route::get('/apiProducts', [ProductController::class, 'apiProducts'])->name('api.products');

    // Products Out Routes
    Route::resource('productsOut', ProductKeluarController::class);
    Route::get('/apiProductsOut', [ProductKeluarController::class, 'apiProductsOut'])->name('api.productsOut');
    Route::get('/exportProductKeluarAll', [ProductKeluarController::class, 'exportProductKeluarAll'])->name('exportPDF.productKeluarAll');
    Route::get('/exportProductKeluarAllExcel', [ProductKeluarController::class, 'exportExcel'])->name('exportExcel.productKeluarAll');
    Route::get('/exportProductKeluar/{id}', [ProductKeluarController::class, 'exportProductKeluar'])->name('exportPDF.productKeluar');

    // Products In Routes
    Route::resource('productsIn', ProductMasukController::class);
    Route::get('/apiProductsIn', [ProductMasukController::class, 'apiProductsIn'])->name('api.productsIn');
    Route::get('/exportProductMasukAll', [ProductMasukController::class, 'exportProductMasukAll'])->name('exportPDF.productMasukAll');
    Route::get('/exportProductMasukAllExcel', [ProductMasukController::class, 'exportExcel'])->name('exportExcel.productMasukAll');
    Route::get('/exportProductMasuk/{id}', [ProductMasukController::class, 'exportProductMasuk'])->name('exportPDF.productMasuk');

    // User Routes
    Route::resource('user', UserController::class);
    Route::get('/apiUser', [UserController::class, 'apiUsers'])->name('api.users');
});