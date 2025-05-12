<x-layouts.app :title="'Add Category'">
    <div class="flex justify-center items-center min-h-screen py-10">
        <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-blue-600 mb-6 text-center">Add New Product Category</h1>

            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Name Input -->
                <div class="mb-4">
                    <label class="block text-lg font-semibold text-gray-700 mb-2">Category Name</label>
                    <input type="text" name="name" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Enter category name">
                </div>

                <!-- Slug Input -->
                <div class="mb-4">
                    <label class="block text-lg font-semibold text-gray-700 mb-2">Slug</label>
                    <input type="text" name="slug" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Enter category slug">
                </div>

                <!-- Description Textarea -->
                <div class="mb-4">
                    <label class="block text-lg font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Add a description"></textarea>
                </div>

                <!-- Image Input -->
                <div class="mb-4">
                    <label class="block text-lg font-semibold text-gray-700 mb-2">Category Image (Optional)</label>
                    <input type="file" name="image" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Submit and Cancel Buttons -->
                <div class="flex items-center justify-between mt-6">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">Save Category</button>
                    <a href="{{ route('categories.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>