<x-app-layout>
    {{-- <x-slot name="header">
        Instructor Dashboard
    </x-slot> --}}

    <div class="p-6">
        <h1 class="text-2xl font-bold">Welcome {{ auth()->user()->name }}</h1>
        <p class="mt-2 text-gray-600">Create and manage your courses.</p>

         {{-- <a href="{{ route('instructor.courses.index') }}"
           class="inline-block mt-6 bg-red-600 text-white px-6 py-3 rounded shadow">
            ➕ Manage My Courses
        </a> --}}
        
    </div>
</x-app-layout>
