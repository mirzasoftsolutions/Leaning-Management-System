<x-app-layout>
    <x-slot name="header">
        <h3 class="fw-bold">Browse Courses</h3>
    </x-slot>

    <div class="container py-4">
        <div class="row g-4">
            @foreach($courses as $course)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">

                        {{-- Card Header --}}
                        <div class="card-img-top text-white d-flex align-items-center justify-content-center"
                             style="height:150px;font-size:22px;font-weight:bold;background: linear-gradient(135deg, {{ ['#667eea', '#764ba2', '#f093fb', '#4facfe', '#00f2fe', '#fa709a'][rand(0, 5)] }} 0%, {{ ['#764ba2', '#667eea', '#4facfe', '#00f2fe', '#fc466b', '#fa709a'][rand(0, 5)] }} 100%);">
                            {{ strtoupper($course->title) }}
                        </div>

                        {{-- Card Body --}}
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                {{ $course->title }}
                            </h5>

                            <p class="card-text text-muted">
                                {{ Str::limit($course->description, 90) }}
                            </p>

                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="fw-bold text-info">
                                        ₹{{ number_format($course->price) }}
                                    </span>

                                    <span class="badge
                                        {{ $course->status === 'published'
                                            ? 'bg-success'
                                            : 'bg-warning text-dark' }}">
                                        {{ ucfirst($course->status) }}
                                    </span>
                                </div>

                                <a href="{{ route('courses.show', $course) }}" class="btn  w-100" style="background: linear-gradient(135deg, {{ ['#667eea', '#764ba2', '#f093fb', '#4facfe', '#00f2fe', '#fa709a'][rand(0, 5)] }} 0%, {{ ['#764ba2', '#667eea', '#4facfe', '#00f2fe', '#fc466b', '#fa709a'][rand(0, 5)] }} 100%);">
                                    View Course
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
