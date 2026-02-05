<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Create Course</h2>
    </x-slot>

    <div class="p-4 mt-3 max-w-xl bg-white mx-auto d-block shadow rounded-lg">

        {{-- Global Errors --}}
        {{-- @if ($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <form method="POST" action="{{ route('instructor.courses.store') }}">
            @csrf

            {{-- Title --}}
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Course Title</label>
                <input
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Course title"
                    class="w-full border rounded p-2
                        @error('title') border-red-500 @enderror">

                @error('title')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Description</label>
                <textarea
                    name="description"
                    placeholder="Course description"
                    class="w-full border rounded p-2
                        @error('description') border-red-500 @enderror"
                    rows="4">{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Status</label>
                <select
                    name="status"
                    class="w-full border rounded p-2
                        @error('status') border-red-500 @enderror">

                    <option value="" disabled>Select Status</option>
                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>
                        Draft
                    </option>
                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>
                        Published
                    </option>
                </select>

                @error('status')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Price --}}
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Price</label>
                <input
                    name="price"
                    type="number"
                    value="{{ old('price') }}"
                    placeholder="Price"
                    class="w-full border rounded p-2
                        @error('price') border-red-500 @enderror">

                @error('price')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3 mt-6">
                <button
                    class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded">
                    Save
                </button>

                <button
                    type="reset"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded">
                    Reset
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
