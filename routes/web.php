<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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



route::get('/', [AdminController::class, 'home']);
route::get('/home', [AdminController::class, 'index'])->name('home');
route::get('/view_rooms', [AdminController::class, 'view_rooms']);
route::get('/create_room', [AdminController::class, 'create_room']);
route::post('/add_room', [AdminController::class, 'add_room']);
route::get('/delete_room/{id}', [AdminController::class, 'delete_room']);
route::get('/update_room/{id}', [AdminController::class, 'update_room']);
route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);
route::get('/room_details/{id}', [HomeController::class, 'room_details']);
route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);
route::get('/bookings', [AdminController::class, 'bookings']);
route::get('/booking_delete/{id}', [AdminController::class, 'booking_delete']);
route::get('/booking_approve/{id}', [AdminController::class, 'booking_approve']);
route::get('/booking_reject/{id}', [AdminController::class, 'booking_reject']);

route::get('/view_gallaries', [AdminController::class, 'view_gallaries']);
route::post('/upload_gallary', [AdminController::class, 'upload_gallary']);
route::get('/delete_gallary/{id}', [AdminController::class, 'delete_gallary']);

route::post('/contactus', [HomeController::class, 'contactus']);
route::get('/messages', [AdminController::class, 'messages']);
route::get('/send_mail/{id}', [AdminController::class, 'send_mail']);
route::post('/mail/{id}', [AdminController::class, 'mail']);


//header bar
route::get('/our_room', [HomeController::class, 'our_room']);
route::get('/gallery_hotel', [HomeController::class, 'gallery_hotel']);
route::get('/contact_hotel', [HomeController::class, 'contact_hotel']);
