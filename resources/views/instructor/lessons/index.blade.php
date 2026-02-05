<x-app-layout>
<div class="container py-5">

    <div class="d-flex justify-content-between mb-4">
        <h3>{{ $course->title }} – Lessons</h3>
        <a href="{{ route('instructor.lessons.create', $course) }}"
           class="btn btn-primary">
           Add Lesson
        </a>
    </div>

    <ul class="list-group">
        @foreach($course->lessons as $lesson)
            <li class="list-group-item">
                {{ $lesson->position }}. {{ $lesson->title }}
            </li>
        @endforeach
    </ul>

</div>
</x-app-layout>
