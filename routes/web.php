<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DeceasedController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;

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

Route::get('/maptest', function () {
    return view('maptest');
});
Route::get('/', [LandingController::class, 'index'])->name('landing.index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'role:admin,customer'])->name('dashboard');


Route::middleware('auth', 'role:admin, customer, employee')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chat', [UserController::class, 'chat'])->name('user.chat');
});

Route::get('products', [LandingController::class, 'products'])->name('customer.products');
Route::get('packages', [LandingController::class, 'packages'])->name('customer.packages');

Route::middleware('auth', 'role:customer')->group(function () {

    Route::get('add-to-cart/{product}', [CartController::class, 'addToCart'])->name('add_to_cart');
    Route::get('remove-from-cart/{product}', [CartController::class, 'removeFromCart'])->name('remove_from_cart');
    Route::get('add/{product}', [CartController::class, 'add'])->name('add');
    Route::get('remove/{product}', [CartController::class, 'remove'])->name('remove');
    Route::get('mycart', [LandingController::class, 'checkout'])->name('checkout');

    Route::get('availPackage/{package}', [PackageController::class, 'availPackage'])->name('customer.availPackage');
    Route::post('orderPackage', [PackageController::class, 'orderPackage'])->name('customer.orderPackage');

    Route::get('confirmation/{order}', [LandingController::class, 'confirmation'])->name('confirmation');
    Route::get('confirmation-package/{order}', [LandingController::class, 'confirmationPackage'])->name('confirmationPackage');
    Route::post('orders', [OrderController::class, 'store'])->name('customer.order.store');

    Route::get('customer/profile/{customer}', [CustomerController::class, 'profile'])->name('customer.profile');

    Route::get('customer/customerOrders/{customer}', [CustomerController::class, 'customerOrders'])->name('customer.customerOrders');
    Route::get('customer/customerDeads/{customer}', [CustomerController::class, 'customerDead'])->name('customer.customerDead');

    Route::get('customer/showOrder/{order}', [CustomerController::class, 'showOrder'])->name('customer.showOrder');
    Route::get('customer/showDead/{deceased}', [CustomerController::class, 'showDead'])->name('customer.showDead');
    Route::get('customer/changePass', [CustomerController::class, 'changePass'])->name('customer.changePass');

    Route::patch('customer/user-update/{user}', [CustomerController::class, 'updateUser'])->name('customer.updateUser');
    Route::patch('customer/update/{customer}', [CustomerController::class, 'update'])->name('customer.update');
});

// Route::middleware('auth', 'role:employee')->group(function () {

//     Route::get('employee/dashboard', [AdminController::class, 'dashboard'])->name('employee.dashboard');

//     Route::get('/admin/orders/forward/{order}', [OrderController::class, 'forward'])->name('admin.orders.forward');
//     Route::get('/admin/orders/backward/{order}', [OrderController::class, 'backward'])->name('admin.orders.backward');
    
//     Route::resource('admin/orders', OrderController::class)->only([
//         'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

//     Route::resource('admin/products', ProductController::class)->only([
//         'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

//     Route::resource('admin/notifications', NotificationController::class)->only([
//         'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

//     Route::resource('admin/announcements', AnnouncementController::class)->only([
//         'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

//     Route::resource('admin/packages', PackageController::class)->only([
//         'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

//     Route::resource('admin/services', ServiceController::class)->only([
//         'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

//     Route::resource('admin/customers', CustomerController::class)->only([
//         'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

//     Route::get('/admin/customer/customerOrders/{customer}', [CustomerController::class, 'customerOrders'])->name('admin.customer.customerOrders');
//     Route::get('/admin/customer/downloadID/{customer}', [CustomerController::class, 'downloadID'])->name('admin.customer.downloadID');
//     Route::get('/admin/customer/showOrder/{order}', [CustomerController::class, 'showOrder'])->name('admin.customer.showOrder');
    
//     Route::get('/admin/customer/customerDeads/{customer}', [CustomerController::class, 'customerDead'])->name('admin.customer.customerDead');
//     Route::get('/admin/customer/showDead/{deceased}', [CustomerController::class, 'showDead'])->name('admin.customer.showDead');

//     Route::resource('admin/employees', EmployeeController::class)->only([
//         'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

//     Route::resource('admin/deceased', DeceasedController::class)->only([
//         'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);
    
// });



Route::middleware('auth', 'role:employee,admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/orders/forward/{order}', [OrderController::class, 'forward'])->name('admin.orders.forward');
    Route::get('/admin/orders/backward/{order}', [OrderController::class, 'backward'])->name('admin.orders.backward');
    
    Route::resource('admin/orders', OrderController::class)->only([
        'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

    Route::resource('admin/products', ProductController::class)->only([
        'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

    Route::resource('admin/notifications', NotificationController::class)->only([
        'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

    Route::resource('admin/announcements', AnnouncementController::class)->only([
        'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

    Route::resource('admin/packages', PackageController::class)->only([
        'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

    Route::resource('admin/services', ServiceController::class)->only([
        'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

    Route::resource('admin/customers', CustomerController::class)->only([
        'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

    Route::get('/admin/customer/customerOrders/{customer}', [CustomerController::class, 'customerOrders'])->name('admin.customer.customerOrders');
    Route::get('/admin/customer/downloadID/{customer}', [CustomerController::class, 'downloadID'])->name('admin.customer.downloadID');
    Route::get('/admin/customer/showOrder/{order}', [CustomerController::class, 'showOrder'])->name('admin.customer.showOrder');
    
    Route::get('/admin/customer/customerDeads/{customer}', [CustomerController::class, 'customerDead'])->name('admin.customer.customerDead');
    Route::get('/admin/customer/showDead/{deceased}', [CustomerController::class, 'showDead'])->name('admin.customer.showDead');

    Route::get('/admin/user/suspend/{user}', [UserController::class, 'suspendStatus'])->name('admin.user.suspend');

    Route::resource('admin/employees', EmployeeController::class)->only([
        'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

    Route::resource('admin/deceased', DeceasedController::class)->only([
        'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);

    Route::resource('admin/users', UserController::class)->only([
        'destroy', 'show', 'store', 'update', 'edit', 'index', 'create',]);
    
});



require __DIR__.'/auth.php';
