<x-app-layout>
<div class="container py-5">

    <div class="row">
        <div class="col-md-8">
            <h1 class="fw-bold">{{ $course->title }}</h1>
            <p class="text-muted">By <strong class="text-danger">{{ $course->user->name }}</strong></p>

            <div class="card mt-4">
                <div class="card-body">
                    <h5>Description</h5>
                    <p>{{ $course->description }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h3 class="text-primary fw-bold">
                        ₹ {{ $course->price }}
                    </h3>

                    @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(auth()->check())
                        @php
                            $isEnrolled = \App\Models\Enrollment::where('user_id', auth()->id())
                                ->where('course_id', $course->id)
                                ->exists();
                        @endphp

                        @if($isEnrolled)
                            <a href="{{ route('courses.learn', $course) }}"
                            class="btn btn-success w-100 mt-3">
                                Start Learning
                            </a>
                        @else
                            <form method="POST"
                                  action="{{ route('courses.enroll', $course) }}">
                                @csrf
                                <button class="btn btn-primary w-100 mt-3">
                                    Enroll Now
                                </button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                        class="btn btn-primary w-100 mt-3">
                            Login to Enroll
                        </a>
                    @endif




                </div>
            </div>
        </div>
    </div>

</div>
</x-app-layout>
