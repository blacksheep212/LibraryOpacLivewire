<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-usepmaroon mb-4">Update User</h1>

        <div class="mb-6">
            <p class="text-gray-600">Use this form to update an existing user in the system.</p>
        </div>

        <div class="mb-6">
            <label for="user_search" class="block text-sm font-medium text-gray-700 mb-1">Search User</label>
            <div class="flex">
                <input type="text" id="user_search" name="user_search" placeholder="Enter user ID, name, or email" class="flex-1 rounded-l-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                <button type="button" class="bg-usepmaroon text-white px-4 py-2 rounded-r-md hover:bg-usepmaroon/90">
                    <i class="fa-solid fa-search"></i>
                </button>
            </div>
        </div>

        <form class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700 mb-1">User ID</label>
                    <input type="text" id="user_id" name="user_id" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50" readonly>
                </div>

                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                </div>

                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email" name="email" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <input type="tel" id="phone" name="phone" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                </div>
            </div>

            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">User Role</label>
                <select id="role" name="role" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                    <option value="">Select a role</option>
                    <option value="student">Student</option>
                    <option value="faculty">Faculty</option>
                    <option value="staff">Staff</option>
                    <option value="admin">Administrator</option>
                </select>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select id="status" name="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="suspended">Suspended</option>
                </select>
            </div>

            <div class="border-t border-gray-200 pt-4">
                <h3 class="text-lg font-medium text-gray-800 mb-3">Change Password (Optional)</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <input type="password" id="new_password" name="new_password" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-usepmaroon text-white rounded-md hover:bg-usepmaroon/90">Update User</button>
            </div>
        </form>
    </div>
</div>
