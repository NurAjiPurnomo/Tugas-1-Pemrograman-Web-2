<x-layouts.app :title="'Product Categories'">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-serif text-gray-800">Product Categories</h1>
            <a href="{{ route('categories.create') }}"
               class="bg-blue-500 text-white px-6 py-3 rounded-lg border border-blue-600 shadow-md hover:bg-blue-600 hover:text-white transition duration-200">
                + Add Category
            </a>
        </div>

        @if(session()->has('successMessage'))
            <div class="mb-4 p-4 bg-green-200 text-green-700 rounded-md shadow-lg">
                {{ session('successMessage') }}
            </div>
        @endif

        <div class="bg-white shadow-xl rounded-md overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NO</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Slug</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @forelse($categories as $key => $category)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $key + 1 }}</td>

                            <td class="px-6 py-4">
                                @if($category->image)
                                    @php
                                        $imageUrl = Str::startsWith($category->image, ['http://', 'https://'])
                                            ? $category->image
                                            : asset('storage/' . $category->image);
                                    @endphp
                                    <img src="{{ $imageUrl }}"
                                         alt="{{ $category->name }}"
                                         class="w-16 h-16 object-cover rounded-lg border border-gray-300">
                                @else
                                    <span class="text-gray-400 italic">No Image</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-900 font-serif">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $category->slug }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $category->description }}</td>

                            <td class="px-6 py-4 text-sm">
                                <div class="flex gap-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                       class="bg-yellow-500 text-white px-6 py-2 rounded-lg border border-yellow-600 shadow-md hover:bg-yellow-600 hover:text-white transition duration-200">
                                       Edit
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('categories.destroy', $category->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this category?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 text-white px-6 py-2 rounded-lg border border-red-600 shadow-md hover:bg-red-600 hover:text-white transition duration-200">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                No categories found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>