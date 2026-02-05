<x-app-layout>
<div class="container py-5">

    <h2 class="fw-bold">{{ $course->title }}</h2>
    <p class="text-muted">{{ $course->description }}</p>

    <hr>

    <h4 class="mb-3">Course Content</h4>

    {{-- Existing Modules --}}
    @foreach($course->modules as $module)
        <div class="card mb-3">
            <div class="card-body">

                <h5 class="fw-bold">{{ $module->title }}</h5>

                {{-- Lessons --}}
                <ul class="list-group mb-3">
                    @foreach($module->lessons as $lesson)
                        <li class="list-group-item">
                            {{ $lesson->title }}
                        </li>
                    @endforeach
                </ul>

                {{-- Add Lesson --}}
                <form method="POST"
                      action="{{ url('/instructor/modules/'.$module->id.'/lessons') }}">
                    @csrf

                    <input class="form-control mb-2"
                           name="title"
                           placeholder="Lesson title">

                    <input class="form-control mb-2"
                           name="video_url"
                           placeholder="Video URL (YouTube/Vimeo)">

                    <button class="btn btn-sm btn-primary">
                        + Add Lesson
                    </button>
                </form>

            </div>
        </div>
    @endforeach

    {{-- Add Module --}}
    <div class="card mt-4">
        <div class="card-body">
            <h5>Add New Module</h5>

            <form method="POST"
                  action="{{ url('/instructor/courses/'.$course->id.'/modules') }}">
                @csrf

                <input class="form-control mb-2"
                       name="title"
                       placeholder="Module title">

                <button class="btn btn-success">
                    + Add Module
                </button>
            </form>
        </div>
    </div>

</div>
</x-app-layout>
