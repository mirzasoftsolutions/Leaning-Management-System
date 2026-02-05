<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function store(Course $course)
    {
        // must be logged in
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // instructor apna course enroll nahi kar sakta
        if ($course->user_id === Auth::id()) {
            abort(403);
        }

        // already enrolled?
        $exists = Enrollment::where('user_id', Auth::id())
            ->where('course_id', $course->id)
            ->exists();

        if ($exists) {
            return back()->with('success', 'Already enrolled');
        }

        Enrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $course->id,
        ]);

        return back()->with('success', 'Enrolled successfully 🎉');
    }
}
