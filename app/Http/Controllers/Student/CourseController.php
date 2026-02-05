<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;
class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 'published')->latest()->get();
        return view('student.courses.index', compact('courses'));
    }

    public function show(Course $course)
{
     
    if ($course->status !== 'published') {
        abort(404);
    }

    return view('student.courses.show', compact('course'));
}


public function myCourses()
{
    $courses = Auth::user()
        ->enrollments()
        ->with('course')
        ->get()
        ->pluck('course');

    return view('student.courses.my-courses', compact('courses'));
}

public function learn(Course $course)
{
    // check enrollment
    $isEnrolled = Enrollment::where('user_id', Auth::id())
        ->where('course_id', $course->id)
        ->exists();

    if (!$isEnrolled) {
        abort(403, 'You are not enrolled in this course');
    }

    $course->load('modules.lessons');

    return view('student.courses.learn', compact('course'));
}



}
