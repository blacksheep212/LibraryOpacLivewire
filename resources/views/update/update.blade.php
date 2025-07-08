<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-usepmaroon mb-4">Update Item</h1>

        <div class="mb-6">
            <p class="text-gray-600">Use this form to update an existing item in the system.</p>
        </div>

        <div class="mb-6">
            <label for="item_search" class="block text-sm font-medium text-gray-700 mb-1">Search Item</label>
            <div class="flex">
                <input type="text" id="item_search" name="item_search" placeholder="Enter item ID or name" class="flex-1 rounded-l-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                <button type="button" class="bg-usepmaroon text-white px-4 py-2 rounded-r-md hover:bg-usepmaroon/90">
                    <i class="fa-solid fa-search"></i>
                </button>
            </div>
        </div>

        <form class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="item_id" class="block text-sm font-medium text-gray-700 mb-1">Item ID</label>
                    <input type="text" id="item_id" name="item_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50" readonly>
                </div>

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" id="name" name="name" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                </div>
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select id="category" name="category" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                    <option value="">Select a category</option>
                    <option value="books">Books</option>
                    <option value="journals">Journals</option>
                    <option value="magazines">Magazines</option>
                </select>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50"></textarea>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="status" name="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="archived">Archived</option>
                </select>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-usepmaroon text-white rounded-md hover:bg-usepmaroon/90">Update Item</button>
            </div>
        </form>
    </div>
</div>
