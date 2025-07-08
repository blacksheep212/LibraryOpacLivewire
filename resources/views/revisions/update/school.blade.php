<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-usepmaroon mb-4">Update School Information</h1>

        <div class="mb-6">
            <p class="text-gray-600">Use this form to update existing school information in the system.</p>
        </div>

        <div class="mb-6">
            <label for="school_search" class="block text-sm font-medium text-gray-700 mb-1">Search School</label>
            <div class="flex">
                <input type="text" id="school_search" name="school_search" placeholder="Enter school ID, name, or code" class="flex-1 rounded-l-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                <button type="button" class="bg-usepmaroon text-white px-4 py-2 rounded-r-md hover:bg-usepmaroon/90">
                    <i class="fa-solid fa-search"></i>
                </button>
            </div>
        </div>

        <form class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="school_id" class="block text-sm font-medium text-gray-700 mb-1">School ID</label>
                    <input type="text" id="school_id" name="school_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50" readonly>
                </div>

                <div>
                    <label for="school_code" class="block text-sm font-medium text-gray-700 mb-1">School Code</label>
                    <input type="text" id="school_code" name="school_code" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                </div>
            </div>

            <div>
                <label for="school_name" class="block text-sm font-medium text-gray-700 mb-1">School Name</label>
                <input type="text" id="school_name" name="school_name" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                <textarea id="address" name="address" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                    <input type="text" id="city" name="city" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                </div>

                <div>
                    <label for="province" class="block text-sm font-medium text-gray-700 mb-1">Province</label>
                    <input type="text" id="province" name="province" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                </div>

                <div>
                    <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">Postal Code</label>
                    <input type="text" id="postal_code" name="postal_code" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="contact_number" class="block text-sm font-medium text-gray-700 mb-1">Contact Number</label>
                    <input type="tel" id="contact_number" name="contact_number" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                </div>
            </div>

            <div>
                <label for="school_type" class="block text-sm font-medium text-gray-700 mb-1">School Type</label>
                <select id="school_type" name="school_type" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                    <option value="">Select school type</option>
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                    <option value="state">State University/College</option>
                </select>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="status" name="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50"></textarea>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-usepmaroon text-white rounded-md hover:bg-usepmaroon/90">Update School</button>
            </div>
        </form>
    </div>
</div>
