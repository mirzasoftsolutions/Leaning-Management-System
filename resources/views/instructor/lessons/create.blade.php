<x-app-layout>
<div class="container py-5">

    <h3>Add Lesson – {{ $course->title }}</h3>

    <form method="POST"
          action="{{ route('instructor.lessons.store', $course) }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Lesson Title</label>
            <input type="text" name="title"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content"
                      class="form-control" rows="4"></textarea>
        </div>

        <button class="btn btn-success">
            Save Lesson
        </button>
    </form>

</div>
</x-app-layout>
