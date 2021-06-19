<?php

use App\Http\Controllers\Admin\ManageChat;
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
})->name('admin.customer.all');

Route::get('/admins/data/customer/all-customer-api',
[ManageCustomer::class, 'CustomerListApi'])->name('admin.customer.list.all');


Route::get('/admins/data/customer/list/videochat',
[ManageChat::class, 'ChatListApiDT'])->name('admin.customer.list.video.chat.list');


Route::get('/admins/data/customer/list/delete/{id}',
[ManageChat::class, 'DeleteChat'])->name('admin.customer.list.video.chat.delete');


Route::get('/admins/customer/details/{uuid}',
[ManageCustomer::class, 'UserProfile'])->name('admin.customer.details');


Route::get('/admins/customer/add',
[ManageCustomer::class, 'AddUserProfile'])->name('admin.customer.add');

Route::post('/admins/customer/add',
[ManageCustomer::class, 'AddUserProfileSave'])->name('admin.customer.add.save');


Route::post('/admins/customer/password/update',
[ManageCustomer::class, 'ChangePassword'])->name('admin.customer.password.update');


Route::post('/admins/customer/chat/add',
[ManageChat::class, 'CreateChat'])->name('admin.customer.chat.add.save');



//Route::get('/admins', [Admin\ManageCustomer::class, 'blankpage']);
