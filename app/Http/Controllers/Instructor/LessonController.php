<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function store(Request $request, Module $module)
    {
        $request->validate([
            'title' => 'required',
            'video_url' => 'required'
        ]);

        Lesson::create([
            'module_id' => $module->id,
            'title' => $request->title,
            'video_url' => $request->video_url,
        ]);

        return back();
    }
}

