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
Route::get('/main/course/{slug}', [App\Http\Controllers\MainPages\MainController::class, 'courseInfo'])->name('courseinfo');
Route::get('/main/schools', [App\Http\Controllers\MainPages\MainController::class, 'schools'])->name('schools');
Route::get('/main/cart', [App\Http\Controllers\MainPages\MainController::class, 'cart'])->name('cart');
Route::get('/main/checkout', [App\Http\Controllers\MainPages\MainController::class, 'checkout'])->name('checkout');
Route::get('/main/my-courses/learning', [App\Http\Controllers\MainPages\MainController::class, 'learnings'])->name('my-learnings');
Route::get('/main/study', [App\Http\Controllers\MainPages\MainController::class, 'studyPage'])->name('study-page');
Route::get('/main/courses', [App\Http\Controllers\MainPages\MainController::class, 'courses'])->name('allcourses');
Route::get('/main/ebooks', [App\Http\Controllers\MainPages\MainController::class, 'Ebooks'])->name('allEbooks');
Route::get('/main/about-us', [App\Http\Controllers\MainPages\MainController::class, 'about'])->name('about');
Route::get('/main/blog', [App\Http\Controllers\MainPages\MainController::class, 'blogs'])->name('blog');
Route::get('/main/read-blog-post/{slug}', [App\Http\Controllers\MainPages\MainController::class, 'blogSingle']);
// Main Routes


// Auth Routes
Auth::routes(['verify' => true]);
// Auth Routes Ends Here

// User Authenticated Routes
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/main/count-cart', [App\Http\Controllers\CountCart::class, 'count']);
Route::get('/main/profile', [App\Http\Controllers\MainPages\MainController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/main/profile-image', [App\Http\Controllers\MainPages\MainController::class, 'profile_image'])->name('profile_image')->middleware('auth');
Route::put('/main/update-profile/{id}', [App\Http\Controllers\MainPages\MainController::class, 'update_profile'])->middleware('auth');
Route::post('/main/add-to-cart', [App\Http\Controllers\MainPages\MainFunction::class, 'AddCart'])->middleware('auth');
Route::delete('/main/delete-cart/{id}', [App\Http\Controllers\MainPages\MainFunction::class, 'deleteCart'])->middleware('auth');
Route::get('/main/verify-payment/{reference}', [App\Http\Controllers\MainPages\MainFunction::class, 'VerifyPayment'])->middleware('auth');
Route::get('/dashboard/my-courses', [App\Http\Controllers\MainPages\Dashboard::class, 'MyCourses'])->middleware('auth');
// User Authenticated Routes

// Admin Routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\MainPages\MainController::class, 'admin'])->name('admin-landing');
    Route::get('/administrator/all-admins', [App\Http\Controllers\Admin\MainFunctions::class, 'allAdmins']);
    Route::get('/administrator/add-admin', [App\Http\Controllers\Admin\MainFunctions::class, 'addAdmin']);
    Route::get('/administrator/all-users', [App\Http\Controllers\Admin\MainFunctions::class, 'allUsers']);
    Route::get('/administrator/profile', [App\Http\Controllers\MainPages\MainController::class, 'admin_profile']);
    Route::post('/administrator/profile-picture/{id}', [App\Http\Controllers\MainPages\MainController::class, 'upload_image']);
    Route::post('/administrator/add-newAdmin', [App\Http\Controllers\Admin\MainFunctions::class, 'addAdminDatabase']);
    Route::get('/administrator/schools', [App\Http\Controllers\Admin\MainFunctions::class, 'schools'])->name('adminSchools');
    Route::get('/administrator/add-schools', [App\Http\Controllers\Admin\MainFunctions::class, 'addSchools'])->name('addSchools');
    Route::post('/administrator/add-schools', [App\Http\Controllers\Admin\MainFunctions::class, 'addSchoolDb']);
    Route::delete('/administrator/delete-schools/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'deleSchoolDb']);
    Route::get('/administrator/vision', [App\Http\Controllers\Admin\MainFunctions::class, 'vision'])->name('vision');
    Route::post('/administrator/add-vision', [App\Http\Controllers\Admin\MainFunctions::class, 'addVision']);
    Route::delete('/administrator/delete-vision/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'deleteVision']);
    Route::get('/administrator/mission', [App\Http\Controllers\Admin\MainFunctions::class, 'mission'])->name('mision');
    Route::post('/administrator/add-mission', [App\Http\Controllers\Admin\MainFunctions::class, 'addMission']);
    Route::delete('/administrator/delete-mission/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'deleteMission']);
    Route::get('/administrator/who-we-are', [App\Http\Controllers\Admin\MainFunctions::class, 'whoWeAre'])->name('who-we-are');
    Route::post('/administrator/add-who-we-are', [App\Http\Controllers\Admin\MainFunctions::class, 'addwhoWeAre']);
    Route::delete('/administrator/delete-about/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'deleteAbout']);
    Route::get('/administrator/intro-video', [App\Http\Controllers\Admin\MainFunctions::class, 'IntroVideo'])->name('IntroVideo');
    Route::post('/administrator/intro-video', [App\Http\Controllers\Admin\MainFunctions::class, 'AddIntroVideo']);
    Route::delete('/administrator/delete-intro/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'dIntro']);
    Route::get('/administrator/banner', [App\Http\Controllers\Admin\MainFunctions::class, 'Banner'])->name('BannerPage');
    Route::post('/administrator/add-banner', [App\Http\Controllers\Admin\MainFunctions::class, 'AddBanner']);
    Route::delete('/administrator/delete-banner/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'DeleteBanner']);
    Route::get('/administrator/add-blog', [App\Http\Controllers\Admin\MainFunctions::class, 'AddBlog'])->name('BlogPage');
    Route::post('/administrator/add-blog', [App\Http\Controllers\Admin\AdminController::class, 'AddBlogDB']);
    Route::get('/administrator/blog-posts', [App\Http\Controllers\Admin\AdminController::class, 'BlogPost'])->name('AllBlogPost');
    Route::delete('/administrator/delete-blog/{id}', [App\Http\Controllers\Admin\AdminController::class, 'DeleteBlog']);
    Route::get('/administrator/create-course', [App\Http\Controllers\Admin\AdminController::class, 'CreateCourse'])->name('CreateCourse');
    Route::post('/administrator/create-course', [App\Http\Controllers\Admin\Courses::class, 'CreateCourseDB']);
    Route::get('/administrator/view-course', [App\Http\Controllers\Admin\Courses::class, 'ViewCourse'])->name('ViewCourse');
    Route::delete('/administrator/delete-courses/{id}', [App\Http\Controllers\Admin\Courses::class, 'DeleteCourses']);
    Route::get('/administrator/upload-course-image/{slug}', [App\Http\Controllers\Admin\Courses::class, 'UploadCourseImage'])->name('UploadCourseImage');
    Route::post('/administrator/upload-course-image-db/{slug}', [App\Http\Controllers\Admin\Courses::class, 'UploadCourseImageDB']);
    Route::get('/administrator/about-me', [App\Http\Controllers\Admin\AdminController::class, 'AboutMe']);
    Route::post('/administrator/add-about-me', [App\Http\Controllers\Admin\AdminController::class, 'AddAboutMe']);
    Route::delete('/administrator/delete-description/{id}', [App\Http\Controllers\Admin\AdminController::class, 'DeleteAboutMe']);
    Route::get('/administrator/cart', [App\Http\Controllers\Admin\AdminController::class, 'Cart']);
    Route::get('/administrator/add-topic/{slug}/{un_id}/{id}', [App\Http\Controllers\Admin\Courses::class, 'Topic']);
    Route::post('/administrator/add-topic', [App\Http\Controllers\Admin\Courses::class, 'AddTopic']);
    Route::delete('/administrator/delete-topic/{id}', [App\Http\Controllers\Admin\Courses::class, 'DeleteTopic']);
    Route::get('/administrator/add-lesson/{t_id}/{c_id}', [App\Http\Controllers\Admin\Courses::class, 'Lesson']);
    Route::post('/administrator/add-lesson/{t_id}/{c_id}', [App\Http\Controllers\Admin\Courses::class, 'AddLesson']);
    Route::get('/administrator/view-lesson/{l_id}', [App\Http\Controllers\Admin\Courses::class, 'ViewLesson']);
    Route::delete('/administrator/delete-lesson/{id}', [App\Http\Controllers\Admin\Courses::class, 'DeleteLesson']);
});
// Admin Routes
