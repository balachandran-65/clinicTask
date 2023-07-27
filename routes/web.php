<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Confirm;
use App\Http\Controllers\Controller;
 

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
// insert into doctors (name,specialization,images,fee,created_at,updated_at) values ('Dr. Jessica', "She is a seasoned family physician who specializes in pediatric and women's health",'female.svg',250,now(),now());
// 


Route::get('/slotsExamples', function () {
    return view('welcome');
});
// 
Route::get('/', function () {
    return view('app');
});

Route::get('/appointment', function () {
    return view('appointmentHtml');
})->name('/appointment/{id}');

Route::get('/informationPageRoot', function () {
    return view('informationPage');
});
Route::get('/confirmDetails', function () {
    return view('confirmDetails4');
});
Route::get('/detailsPage', function () {
    return view('detailsPage');
});
Route::get('/', function () {
    return view('app');
});


// payments route
Route::get('/payment/success',[confirm::class,'paymentResult'])->name('success');

Route::get('/payment/cancel', function () {
    return view('confirmDetails');
})->name('cancel');
