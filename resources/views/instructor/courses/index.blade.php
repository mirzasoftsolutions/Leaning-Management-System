<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">My Courses</h2>

            <a href="{{ route('instructor.courses.create') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow">
                + New Course
            </a>
        </div>
    </x-slot>

    <div class="p-6">
        <div class="p-6 overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold">#</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Title</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Description</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Price</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Status</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($courses as $course)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm">
                                {{ $loop->iteration + ($courses->currentPage() - 1) * $courses->perPage() }}
                            </td>

                            <td class="px-4 py-3 font-medium text-gray-900">
                                {{ $course->title }}
                            </td>

                            <td class="px-4 py-3 text-sm text-gray-600">
                                {{ Str::limit($course->description, 60) }}
                            </td>

                            <td class="px-4 py-3 font-semibold">
                                ₹{{ number_format($course->price) }}
                            </td>

                            <td class="px-4 py-3">
                                <span class="px-3 py-1 text-xs rounded-full
                                    {{ $course->status === 'published'
                                        ? 'bg-green-100 text-green-700'
                                        : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($course->status) }}
                                </span>
                            </td>

                            <td class="px-4 py-3 text-center">
                                <div class="flex justify-center gap-3">
                                    <a href="{{ route('instructor.courses.edit', $course) }}"
                                       class="text-blue-600 hover:underline">
                                        Edit
                                    </a>

                                    <form method="POST" 
                                          action="{{ route('instructor.courses.destroy', $course) }}"
                                          onsubmit="return confirm('Are you sure you want to delete this course?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline">
                                            Delete
                                        </button>
                                    </form>

                                     <a href="{{ route('instructor.courses.show', $course) }}"
                                        class="btn btn-sm btn-primary">
                                            Manage Content
                                        </a>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">
                                No courses found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $courses->links() }}
        </div>
    </div>




</x-app-layout>
