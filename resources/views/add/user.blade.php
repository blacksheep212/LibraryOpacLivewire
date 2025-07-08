<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-usepmaroon mb-4">Add New User</h1>

        <div class="mb-6">
            <p class="text-gray-600">Use this form to add a new user to the system.</p>
        </div>

        <form class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-usepmaroon text-white rounded-md hover:bg-usepmaroon/90">Add User</button>
            </div>
        </form>
    </div>
</div>
