<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required'
        ]);

        Module::create([
            'course_id' => $course->id,
            'title' => $request->title,
        ]);

        return back();
    }
}
