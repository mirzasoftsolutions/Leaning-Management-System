<?php
use App\Http\Controllers\Student\CourseController as StudentCourseController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\LessonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\EnrollmentController;
use App\Http\Controllers\Instructor\ModuleController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/courses', [StudentCourseController::class, 'index'])
    ->name('courses.index');

Route::get('/courses/{course}', [StudentCourseController::class, 'show'])
->name('courses.show');

Route::post('/courses/{course}/enroll',
    [EnrollmentController::class, 'store']
)->middleware('auth')->name('courses.enroll');

Route::get('/my-courses',
    [StudentCourseController::class, 'myCourses']
)->middleware('auth')->name('student.courses');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::post('/instructor/courses/{course}/modules',
    [ModuleController::class, 'store']
)->middleware('auth');

Route::post('/instructor/modules/{module}/lessons',
    [LessonController::class, 'store']
)->middleware('auth');

Route::get('/instructor/courses/{course}',
    [CourseController::class, 'show']
)->middleware('auth')
 ->name('instructor.courses.show');

Route::get('/courses/{course}/learn',
    [StudentCourseController::class, 'learn']
)->middleware('auth')
 ->name('courses.learn');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');

    Route::get('/instructor/dashboard', function () {
        return view('instructor.dashboard');
    })->name('instructor.dashboard');

    // Instructor-only
    Route::middleware('can:isInstructor')->prefix('instructor')->name('instructor.')->group(function () {
        Route::resource('courses', CourseController::class);
        Route::resource('lessons', LessonController::class);
    });

    

});








require __DIR__ . '/auth.php';
