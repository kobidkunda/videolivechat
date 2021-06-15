<?php

use App\Http\Controllers\Admin\ManageCustomer;
use App\Http\Controllers\Customer\CustomerDetails;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admins', function () {
    return view('admin.pages.blank');
});

Route::get('/admins/data/customer/all-customer-api',
[ManageCustomer::class, 'CustomerListApi'])->name('admin.customer.list.all');

//Route::get('/admins', [Admin\ManageCustomer::class, 'blankpage']);
