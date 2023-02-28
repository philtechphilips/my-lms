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
Route::get('/main/ebook/{slug}', [App\Http\Controllers\MainPages\MainController::class, 'ebookInfo'])->name('ebookinfo');
Route::get('/main/course/{slug}', [App\Http\Controllers\MainPages\MainController::class, 'courseInfo'])->name('courseinfo');
Route::get('/main/schools', [App\Http\Controllers\MainPages\MainController::class, 'schools'])->name('schools');
Route::get('/main/school-courses/{id}', [App\Http\Controllers\MainPages\MainController::class, 'schoolsCourses']);
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
Route::get('/main/cart', [App\Http\Controllers\MainPages\MainController::class, 'cart'])->name('cart')->middleware('auth');
Route::get('/main/checkout', [App\Http\Controllers\MainPages\MainController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::get('/main/profile', [App\Http\Controllers\MainPages\MainController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/main/profile-image', [App\Http\Controllers\MainPages\MainController::class, 'profile_image'])->name('profile_image')->middleware('auth');
Route::put('/main/update-profile/{id}', [App\Http\Controllers\MainPages\MainController::class, 'update_profile'])->middleware('auth');
Route::post('/main/add-to-cart', [App\Http\Controllers\MainPages\MainFunction::class, 'AddCart'])->middleware('auth');
Route::post('/main/add-ebook-to-cart', [App\Http\Controllers\MainPages\MainFunction::class, 'AddEbookCart'])->middleware('auth');
Route::delete('/main/delete-cart/{id}', [App\Http\Controllers\MainPages\MainFunction::class, 'deleteCart'])->middleware('auth');
Route::get('/main/verify-payment/{reference}', [App\Http\Controllers\MainPages\MainFunction::class, 'VerifyPayment'])->middleware('auth');
Route::get('/dashboard/my-courses', [App\Http\Controllers\MainPages\Dashboard::class, 'MyCourses'])->middleware('auth');
Route::get('/dashboard/my-ebooks', [App\Http\Controllers\MainPages\Dashboard::class, 'Ebooks'])->middleware('auth');
Route::get('/dashboard/learn/history', [App\Http\Controllers\MainPages\Dashboard::class, 'Assessments'])->middleware('auth');
Route::get('/dashboard/read-ebook/{id}', [App\Http\Controllers\MainPages\Dashboard::class, 'ReadEbook'])->middleware('auth');
Route::get('/dashboard/ebook-details/{id}', [App\Http\Controllers\MainPages\Dashboard::class, 'EbookDetails'])->middleware('auth');
Route::post('/main/add-ebook-review', [App\Http\Controllers\MainPages\Dashboard::class, 'EbookReview'])->middleware('auth');
Route::get('/dashboard/payments', [App\Http\Controllers\MainPages\Dashboard::class, 'Payments'])->middleware('auth');

Route::get('/dashboard/certificate', [App\Http\Controllers\MainPages\Dashboard::class, 'Certificate'])->middleware('auth');


Route::post('/main/add-course-review', [App\Http\Controllers\MainPages\Dashboard::class, 'CourseReview'])->middleware('auth');
Route::get('/dashboard/video-course/{id}', [App\Http\Controllers\MainPages\Videos::class, 'index'])->middleware('auth');
Route::get('/dashboard/take-lessons/{course_id}/{lesson_id}', [App\Http\Controllers\MainPages\Videos::class, 'watch'])->middleware('auth');
Route::post('/dashboard/course-comment', [App\Http\Controllers\MainPages\Videos::class, 'Comment'])->middleware('auth');
Route::post('/dashboard/blog-comment', [App\Http\Controllers\MainPages\Videos::class, 'BlogComment'])->middleware('auth');
Route::post('/dashboard/complete-lesson', [App\Http\Controllers\MainPages\Videos::class, 'FinishCourse'])->middleware('auth');
Route::get('/dashboard/live-schedules/{id}', [App\Http\Controllers\MainPages\Dashboard::class, 'LiveClass']);


// QUiz Routes
Route::get('/dashboard/attempt/quiz/{course_id}/{quiz_id}/{quest_id}', [App\Http\Controllers\MainPages\Dashboard::class, 'QuizPage'])->middleware('auth');
Route::post('/dashboard/submit-answer', [App\Http\Controllers\MainPages\Dashboard::class, 'AddQuiz'])->middleware('auth');
Route::post('/dashboard/finish-quiz', [App\Http\Controllers\MainPages\Dashboard::class, 'FinishQuiz'])->middleware('auth');
Route::get('/dashboard/assessment-score/{quiz_id}', [App\Http\Controllers\MainPages\Dashboard::class, 'ViewScore'])->middleware('auth');
// Quiz Routes


// Feedback
Route::get('/dashboard/feedback', [App\Http\Controllers\MainPages\Dashboard::class, 'FeedBack'])->middleware('auth');
Route::post('/dashboard/feedback', [App\Http\Controllers\MainPages\Dashboard::class, 'FeedBackDB'])->middleware('auth');
// Feedback
// User Authenticated Routes

// Admin Routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\MainPages\MainController::class, 'admin'])->name('admin-landing');
    Route::get('/administrator/all-admins', [App\Http\Controllers\Admin\MainFunctions::class, 'allAdmins']);
    Route::get('/administrator/add-admin', [App\Http\Controllers\Admin\MainFunctions::class, 'addAdmin']);
    Route::delete('/administrator/delete-admin/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'DeleteAdmin']);
    Route::get('/administrator/all-users', [App\Http\Controllers\Admin\MainFunctions::class, 'allUsers']);
    Route::get('/administrator/profile', [App\Http\Controllers\MainPages\MainController::class, 'admin_profile']);
    Route::post('/administrator/profile-picture/{id}', [App\Http\Controllers\MainPages\MainController::class, 'upload_image']);
    Route::post('/administrator/add-newAdmin', [App\Http\Controllers\Admin\MainFunctions::class, 'addAdminDatabase']);
    Route::get('/administrator/schools', [App\Http\Controllers\Admin\MainFunctions::class, 'schools'])->name('adminSchools');
    Route::get('/administrator/add-schools', [App\Http\Controllers\Admin\MainFunctions::class, 'addSchools'])->name('addSchools');
    Route::get('/administrator/edit-schools/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'EditSchools'])->name('EditSchools');
    Route::put('/administrator/edit-schools/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'UpdateSchools'])->name('EditSchools');
    Route::post('/administrator/add-schools', [App\Http\Controllers\Admin\MainFunctions::class, 'addSchoolDb']);
    Route::delete('/administrator/delete-schools/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'deleSchoolDb']);
    Route::get('/administrator/vision', [App\Http\Controllers\Admin\MainFunctions::class, 'vision'])->name('vision');
    Route::get('/administrator/edit-vision/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'editvision']);
    Route::put('/administrator/update-vision/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'updatevision']);
    Route::post('/administrator/add-vision', [App\Http\Controllers\Admin\MainFunctions::class, 'addVision']);
    Route::delete('/administrator/delete-vision/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'deleteVision']);
    Route::get('/administrator/mission', [App\Http\Controllers\Admin\MainFunctions::class, 'mission'])->name('mision');
    Route::get('/administrator/edit-mission/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'editmission']);
    Route::put('/administrator/update-mission/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'updatemission']);
    Route::post('/administrator/add-mission', [App\Http\Controllers\Admin\MainFunctions::class, 'addMission']);
    Route::delete('/administrator/delete-mission/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'deleteMission']);
    Route::get('/administrator/who-we-are', [App\Http\Controllers\Admin\MainFunctions::class, 'whoWeAre'])->name('who-we-are');
    Route::get('/administrator/edit-who-we-are/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'EditwhoWeAre']);
    Route::put('/administrator/update-about/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'UpdateAbout']);
    Route::post('/administrator/add-who-we-are', [App\Http\Controllers\Admin\MainFunctions::class, 'addwhoWeAre']);
    Route::delete('/administrator/delete-about/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'deleteAbout']);
    Route::get('/administrator/intro-video', [App\Http\Controllers\Admin\MainFunctions::class, 'IntroVideo'])->name('IntroVideo');
    Route::post('/administrator/intro-video', [App\Http\Controllers\Admin\MainFunctions::class, 'AddIntroVideo']);
    Route::delete('/administrator/delete-intro/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'dIntro']);
    Route::get('/administrator/banner', [App\Http\Controllers\Admin\MainFunctions::class, 'Banner'])->name('BannerPage');
    Route::get('/administrator/edit-banner/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'EditBanner']);
    Route::put('/administrator/update-banner/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'UpdateBanner']);
    Route::post('/administrator/add-banner', [App\Http\Controllers\Admin\MainFunctions::class, 'AddBanner']);
    Route::delete('/administrator/delete-banner/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'DeleteBanner']);

    Route::get('/administrator/add-blog', [App\Http\Controllers\Admin\MainFunctions::class, 'AddBlog'])->name('BlogPage');
    Route::get('/administrator/blog-comment', [App\Http\Controllers\Admin\MainFunctions::class, 'BlogComment']);
    Route::delete('/administrator/delete-blog-comment/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'DeleteBlogComment']);

    Route::put('/administrator/updtae-blog/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'UpdateBlog']);
    Route::get('/administrator/edit-blog/{id}', [App\Http\Controllers\Admin\MainFunctions::class, 'EditBlog']);
    Route::post('/administrator/add-blog', [App\Http\Controllers\Admin\AdminController::class, 'AddBlogDB']);
    Route::get('/administrator/blog-posts', [App\Http\Controllers\Admin\AdminController::class, 'BlogPost'])->name('AllBlogPost');
    Route::delete('/administrator/delete-blog/{id}', [App\Http\Controllers\Admin\AdminController::class, 'DeleteBlog']);
    Route::get('/administrator/create-course', [App\Http\Controllers\Admin\AdminController::class, 'CreateCourse'])->name('CreateCourse');

    Route::get('/administrator/about-me', [App\Http\Controllers\Admin\AdminController::class, 'AboutMe']);
    Route::get('/administrator/edit-about-me/{id}', [App\Http\Controllers\Admin\AdminController::class, 'EditAbout']);
    Route::put('/administrator/update-about-me/{id}', [App\Http\Controllers\Admin\AdminController::class, 'EditAboutMe']);
    Route::post('/administrator/add-about-me', [App\Http\Controllers\Admin\AdminController::class, 'AddAboutMe']);
    Route::delete('/administrator/delete-description/{id}', [App\Http\Controllers\Admin\AdminController::class, 'DeleteAboutMe']);
    Route::get('/administrator/cart', [App\Http\Controllers\Admin\AdminController::class, 'Cart']);


    // Courses Routes
    Route::post('/administrator/create-course', [App\Http\Controllers\Admin\Courses::class, 'CreateCourseDB']);
    Route::get('/administrator/view-course', [App\Http\Controllers\Admin\Courses::class, 'ViewCourse'])->name('ViewCourse');
    Route::get('/administrator/view-course-details/{id}', [App\Http\Controllers\Admin\Courses::class, 'ViewCourseDetails']);
    Route::delete('/administrator/delete-courses/{id}', [App\Http\Controllers\Admin\Courses::class, 'DeleteCourses']);
    Route::get('/administrator/upload-course-image/{slug}', [App\Http\Controllers\Admin\Courses::class, 'UploadCourseImage'])->name('UploadCourseImage');
    Route::post('/administrator/upload-course-image-db/{slug}', [App\Http\Controllers\Admin\Courses::class, 'UploadCourseImageDB']);
    Route::get('/administrator/add-topic/{slug}/{un_id}/{id}', [App\Http\Controllers\Admin\Courses::class, 'Topic']);
    Route::post('/administrator/add-topic', [App\Http\Controllers\Admin\Courses::class, 'AddTopic']);
    Route::delete('/administrator/delete-topic/{id}', [App\Http\Controllers\Admin\Courses::class, 'DeleteTopic']);
    Route::get('/administrator/add-lesson/{t_id}/{c_id}', [App\Http\Controllers\Admin\Courses::class, 'Lesson']);
    Route::post('/administrator/add-lesson/{t_id}/{c_id}', [App\Http\Controllers\Admin\Courses::class, 'AddLesson']);
    Route::get('/administrator/view-lesson/{l_id}', [App\Http\Controllers\Admin\Courses::class, 'ViewLesson']);

    Route::get('/administrator/upload-lesson-video-file/{id}', [App\Http\Controllers\Admin\Courses::class, 'LessonVideo']);
    Route::post('/administrator/upload-lesson-video-db-input/{id}', [App\Http\Controllers\Admin\Courses::class, 'LessonVideoUpload']);
    Route::post('/administrator/upload-lesson-video-db/{id}', [App\Http\Controllers\Admin\Courses::class, 'LessonVideoDB']);

    Route::get('/administrator/lesson-files/{id}', [App\Http\Controllers\Admin\Courses::class, 'LessonFile']);
    Route::post('/administrator/upload-lesson-files-input/{id}', [App\Http\Controllers\Admin\Courses::class, 'LessonFileDB']);
    Route::post('/administrator/upload-lesson-file/{id}', [App\Http\Controllers\Admin\Courses::class, 'LessonFileUpload']);

    Route::delete('/administrator/delete-lesson/{id}', [App\Http\Controllers\Admin\Courses::class, 'DeleteLesson']);
    Route::get('/administrator/edit-course/{id}', [App\Http\Controllers\Admin\Courses::class, 'EditCourse']);
    Route::put('/administrator/update-course/{id}', [App\Http\Controllers\Admin\Courses::class, 'UpdateCourse']);
    Route::get('/administrator/edit-topic/{id}/{c_id}', [App\Http\Controllers\Admin\Courses::class, 'EditTopic']);
    Route::get('/administrator/edit-lesson/{id}', [App\Http\Controllers\Admin\Courses::class, 'EditLesson']);
    Route::put('/administrator/edit-lesson/{id}', [App\Http\Controllers\Admin\Courses::class, 'UpdateLesson']);
    Route::get('/admin/course-comment', [App\Http\Controllers\Admin\Courses::class, 'Comment']);
    Route::delete('/administrator/delete-comment/{id}', [App\Http\Controllers\Admin\Courses::class, 'DeleteComment']);
    Route::get('/admin/comment-reply/{id}/{lesson_id}', [App\Http\Controllers\Admin\Courses::class, 'ReplyComment']);
    Route::post('/administrator/reply-comment', [App\Http\Controllers\Admin\Courses::class, 'ReplyCommentDB']);


    Route::get('/administrator/upload-video-file/{id}', [App\Http\Controllers\Admin\Courses::class, 'VidoeUpload']);
    Route::post('/administrator/upload-video-db-input/{id}', [App\Http\Controllers\Admin\Courses::class, 'UpdateVidoeUpload']);
    Route::post('/administrator/upload-video-db/{id}', [App\Http\Controllers\Admin\Courses::class, 'VidoeUploadDB']);

    Route::put('/administrator/publish-course/{id}', [App\Http\Controllers\Admin\Courses::class, 'PublishCourse']);
    // Courses Routes

    // E-Book Routes
    Route::get('/administrator/create-ebook', [App\Http\Controllers\Admin\Ebook::class, 'Ebook']);
    Route::post('/administrator/create-ebook-db', [App\Http\Controllers\Admin\Ebook::class, 'AddEbook']);
    Route::get('/administrator/view-ebooks', [App\Http\Controllers\Admin\Ebook::class, 'ViewEbook']);
    Route::delete('/administrator/delete-ebook/{id}', [App\Http\Controllers\Admin\Ebook::class, 'DeleteEbook']);
    Route::get('/administrator/see-ebook-details/{id}', [App\Http\Controllers\Admin\Ebook::class, 'ViewEbookDetails']);
    Route::get('/administrator/edit-ebook/{id}', [App\Http\Controllers\Admin\Ebook::class, 'EditEbook']);
    Route::put('/administrator/update-ebook/{id}', [App\Http\Controllers\Admin\Ebook::class, 'UpdateEbook']);
    // Route::get('/administrator/upload-ebook-image/{id}', [App\Http\Controllers\Admin\Ebook::class, 'ViewEbookUp']);
    // Route::post('/administrator/upload-ebook-image-db/{id}', [App\Http\Controllers\Admin\Ebook::class, 'UploadEbookImageDB']);
    // Route::get('/administrator/upload-ebook-file/{id}', [App\Http\Controllers\Admin\Ebook::class, 'EbookFile']);
    // Route::post('/administrator/upload-ebook-file-db/{id}', [App\Http\Controllers\Admin\Ebook::class, 'UploadEbookFile']);
    // E-Book Routes


    // Reviews
    Route::get('/administrator/ebook-reviews', [App\Http\Controllers\Admin\Ebook::class, 'EbookReviews']);
    Route::delete('/administrator/delete-e-review/{id}', [App\Http\Controllers\Admin\Ebook::class, 'DeleteEbookReview']);
    Route::put('/administrator/update-review/{id}', [App\Http\Controllers\Admin\Ebook::class, 'UpdateEbookReview']);
    Route::get('/administrator/course-reviews', [App\Http\Controllers\Admin\Courses::class, 'CourseReviews']);
    Route::get('/administrator/schedule-live-class', [App\Http\Controllers\Admin\Courses::class, 'LiveClass']);
    Route::post('/administrator/create-live-schedule', [App\Http\Controllers\Admin\Courses::class, 'LiveClassDB']);
    Route::delete('/administrator/delete-live-schedules/{id}', [App\Http\Controllers\Admin\Courses::class, 'LiveClassDelete']);
    Route::get('/administrator/edit-live-schedules/{id}', [App\Http\Controllers\Admin\Courses::class, 'EditLiveClass']);
    Route::put('/administrator/update-live-schedule/{id}', [App\Http\Controllers\Admin\Courses::class, 'UpdateLiveClass']);
    Route::delete('/administrator/delete-c-review/{id}', [App\Http\Controllers\Admin\Courses::class, 'DeleteCourseReview']);
    Route::put('/administrator/update-review/{id}', [App\Http\Controllers\Admin\Courses::class, 'UpdateCourseReview']);
    Route::get('/administrator/feedbacks', [App\Http\Controllers\Admin\Ebook::class, 'FeedBacks']);
    Route::delete('/administrator/delete-feedback-review/{id}', [App\Http\Controllers\Admin\Ebook::class, 'DeleteFeedback']);
    Route::put('/administrator/update-feedback/{id}', [App\Http\Controllers\Admin\Ebook::class, 'UpdateFeedback']);
    Route::get('/administrator/certificate', [App\Http\Controllers\Admin\Courses::class, 'Certificate']);
    Route::get('/administrator/certificate/{course_id}', [App\Http\Controllers\Admin\Courses::class, 'SelectUser']);
    Route::get('/administrator/certificate/{course_id}/{user_id}', [App\Http\Controllers\Admin\Courses::class, 'UploadCertificate']);
    Route::post('/administrator/certificate/{user_id}/{course_id}', [App\Http\Controllers\Admin\Courses::class, 'CertificateDB']);
    Route::post('/administrator/certificate-db/{user_id}/{course_id}', [App\Http\Controllers\Admin\Courses::class, 'CertificateDBInput']);
    // Reviews


    // Payment Routes
    Route::get('/administrator/payments', [App\Http\Controllers\Admin\Payment::class, 'Payment']);

    // Payment Routes

    // Quiz routes
    Route::get('/administrator/add-quiz/{id}', [App\Http\Controllers\Admin\Quiz::class, 'Index']);
    Route::post('/administrator/add-Quiz', [App\Http\Controllers\Admin\Quiz::class, 'AddQuiz']);

    Route::get('/administrator/edit-Quiz/{id}', [App\Http\Controllers\Admin\Quiz::class, 'EditQuiz']);
    Route::put('/administrator/update-Quiz/{id}', [App\Http\Controllers\Admin\Quiz::class, 'UpdateQuiz']);

    Route::delete('/administrator/delete-Quiz/{id}', [App\Http\Controllers\Admin\Quiz::class, 'DeleteQuiz']);
    Route::get('/administrator/add-question/{id}/{course_id}', [App\Http\Controllers\Admin\Quiz::class, 'AddQuestion']);
    Route::post('/administration/options', [App\Http\Controllers\Admin\Quiz::class, 'CorrectAns']);
    Route::post('/administrator/add-question', [App\Http\Controllers\Admin\Quiz::class, 'AddQuestionDB']);
    Route::delete('/administrator/delete-Question/{id}', [App\Http\Controllers\Admin\Quiz::class, 'DeleteQuest']);
    Route::get('/administrator/edit-Question/{id}', [App\Http\Controllers\Admin\Quiz::class, 'EditQuestion']);
    Route::put('/administrator/edit-Question/{id}', [App\Http\Controllers\Admin\Quiz::class, 'EditQuest']);
    // Quiz Routes
});


// Admin Routes





// Teacher Routes
Route::middleware(['auth', 'teacher'])->group(function () {
    Route::get('/teacher/dashboard', [App\Http\Controllers\MainPages\MainController::class, 'admin']);
});


// Teacher Routes
