<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $courses = Course::where('user_id', Auth::id())
        ->latest()
        ->paginate(10);

        return view('instructor.courses.index', compact('courses'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructor.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
        'title' => 'required|string|max:255',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'status' => 'nullable|in:draft,published',
    ]);

        Auth::user()->courses()->create($request->only(
            'title', 'description', 'price', 'status'
        ));

        return redirect()->route('instructor.courses.index')
            ->with('success', 'Course created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        // security: sirf owner dekh sake
            if ($course->user_id !== Auth::id()) {
                abort(403);
            }

            $course->load('modules.lessons');

            return view('instructor.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
        {
            if ($course->user_id !== Auth::id()) {
                abort(403);
            }

            return view('instructor.courses.edit', compact('course'));
        }


   

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Course $course)
{
    if ($course->user_id !== Auth::id()) {
        abort(403);
    }

    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'status' => 'nullable|in:draft,published',
    ]);

    $course->update([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'status' => $request->status,
    ]);

    return redirect()
        ->route('instructor.courses.index')
        ->with('success', 'Course updated successfully!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
{
    if ($course->user_id !== Auth::id()) {
        abort(403);
    }

    $course->delete();

    return back()->with('success', 'Course deleted!');
}

}
