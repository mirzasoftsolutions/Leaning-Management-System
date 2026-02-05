<x-app-layout>
<x-slot name="header">Edit Course</x-slot>

<div class="p-6 max-w-xl">

<form method="POST"
      action="{{ route('instructor.courses.update', $course) }}">

@csrf
@method('PUT')

<label class="block mb-1">Title</label>
<input name="title"
       value="{{ old('title', $course->title) }}"
       class="w-full border p-2 mb-3">

<label class="block mb-1">Description</label>
<textarea name="description"
          class="w-full border p-2 mb-3">{{ old('description', $course->description) }}</textarea>

        
<label for="status" class="block mb-1">Status</label>
<select name="status" class="w-full border p-2 mb-3">
    <option value="draft" {{ old('status', $course->status) === 'draft' ? 'selected' : '' }}>Draft</option>
    <option value="published" {{ old('status', $course->status) === 'published' ? 'selected' : '' }}>Published</option>
</select>

<label class="block mb-1">Price</label>
<input type="number"
       name="price"
       value="{{ old('price', $course->price) }}"
       class="w-full border p-2 mb-3">

<button class="bg-red-600 mt-4  text-white px-4 py-2 rounded">
    Update Course
</button>

</form>

</div>
</x-app-layout>
