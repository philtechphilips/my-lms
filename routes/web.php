<?php

use Illuminate\Support\Facades\Auth;
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

// Main Routes
Route::get('/', [App\Http\Controllers\MainPages\MainController::class, 'index'])->name('homePage');
Route::get('/main/ebook/slug', [App\Http\Controllers\MainPages\MainController::class, 'ebookInfo'])->name('ebookinfo');
Route::get('/main/course/slug', [App\Http\Controllers\MainPages\MainController::class, 'courseInfo'])->name('courseinfo');
Route::get('/main/schools', [App\Http\Controllers\MainPages\MainController::class, 'schools'])->name('schools');
Route::get('/main/cart', [App\Http\Controllers\MainPages\MainController::class, 'cart'])->name('cart');
Route::get('/main/checkout', [App\Http\Controllers\MainPages\MainController::class, 'checkout'])->name('checkout');
Route::get('/main/my-courses/learning', [App\Http\Controllers\MainPages\MainController::class, 'learnings'])->name('my-learnings');
Route::get('/main/course/cuurent-course', [App\Http\Controllers\MainPages\MainController::class, 'studyPage'])->name('study-page');
Route::get('/main/courses', [App\Http\Controllers\MainPages\MainController::class, 'courses'])->name('allcourses');
Route::get('/main/ebooks', [App\Http\Controllers\MainPages\MainController::class, 'Ebooks'])->name('allEbooks');
Route::get('/main/about-us', [App\Http\Controllers\MainPages\MainController::class, 'about'])->name('about');
Route::get('/main/blog', [App\Http\Controllers\MainPages\MainController::class, 'blogs'])->name('blog');
// Main Routes


// Auth Routes
Auth::routes(['verify' => true]);
// Auth Routes Ends Here

// User Authenticated Routes
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/main/profile', [App\Http\Controllers\MainPages\MainController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/main/profile-image', [App\Http\Controllers\MainPages\MainController::class, 'profile_image'])->name('profile_image')->middleware('auth');
Route::put('/main/update-profile/{id}', [App\Http\Controllers\MainPages\MainController::class, 'update_profile'])->middleware('auth');
// User Authenticated Routes

// Admin Routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\MainPages\MainController::class, 'admin']);
});
// Admin Routes
