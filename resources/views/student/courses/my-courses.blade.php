<x-app-layout>
<div class="container py-5">

    <h2 class="fw-bold mb-4">My Courses</h2>

    @if($courses->isEmpty())
        <div class="alert alert-info">
            You are not enrolled in any course yet.
        </div>
    @endif

    <div class="row">
        @foreach($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">

                    <div class="card-body">
                        <h5 class="card-title fw-bold">
                            {{ $course->title }}
                        </h5>

                        <p class="text-muted">
                            Instructor: {{ $course->user->name }}
                        </p>

                        <p>
                            {{ Str::limit($course->description, 80) }}
                        </p>
                    </div>

                    <div class="card-footer bg-white">
                        {{-- <a href="{{ route('courses.show', $course) }}"
                           class="btn btn-outline-primary w-100">
                            Continue Learning
                        </a> --}}
                         <a href="{{ route('courses.learn', $course) }}"
                        class="btn btn-outline-success w-100 mt-3">
                            Continue Learning
                        </a>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>
</x-app-layout>
