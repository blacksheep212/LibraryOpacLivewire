<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-usepmaroon mb-4">Account Management Settings</h1>

        <div class="mb-6">
            <p class="text-gray-600">Configure account management settings and permissions.</p>
        </div>

        <!-- Tabs -->
        <div class="border-b border-gray-200 mb-6">
            <nav class="-mb-px flex space-x-8">
                <a href="#" class="border-usepmaroon text-usepmaroon whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" aria-current="page">
                    General Settings
                </a>
                <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Permissions
                </a>
                <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    User Roles
                </a>
                <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Notifications
                </a>
            </nav>
        </div>

        <!-- General Settings Form -->
        <form class="space-y-6">
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Account Settings</h3>

                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <label class="text-sm font-medium text-gray-700">User Registration</label>
                            <p class="text-sm text-gray-500">Allow new users to register accounts</p>
                        </div>
                        <div class="flex items-center">
                            <button type="button" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-usepmaroon" role="switch" aria-checked="true">
                                <span aria-hidden="true" class="translate-x-5 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <label class="text-sm font-medium text-gray-700">Email Verification</label>
                            <p class="text-sm text-gray-500">Require email verification for new accounts</p>
                        </div>
                        <div class="flex items-center">
                            <button type="button" class="bg-usepmaroon relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-usepmaroon" role="switch" aria-checked="true">
                                <span aria-hidden="true" class="translate-x-5 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                            </button>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <label class="text-sm font-medium text-gray-700">Two-Factor Authentication</label>
                            <p class="text-sm text-gray-500">Enable two-factor authentication option for users</p>
                        </div>
                        <div class="flex items-center">
                            <button type="button" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-usepmaroon" role="switch" aria-checked="false">
                                <span aria-hidden="true" class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Password Policy</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="min_password_length" class="block text-sm font-medium text-gray-700 mb-1">Minimum Password Length</label>
                        <input type="number" id="min_password_length" name="min_password_length" min="6" max="32" value="8" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="password_expiry_days" class="block text-sm font-medium text-gray-700 mb-1">Password Expiry (Days)</label>
                        <input type="number" id="password_expiry_days" name="password_expiry_days" min="0" max="365" value="90" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                        <p class="mt-1 text-xs text-gray-500">Set to 0 for no expiration</p>
                    </div>
                </div>

                <div class="mt-4 space-y-2">
                    <div class="flex items-center">
                        <input id="require_uppercase" name="require_uppercase" type="checkbox" checked class="h-4 w-4 text-usepmaroon focus:ring-usepmaroon border-gray-300 rounded">
                        <label for="require_uppercase" class="ml-2 block text-sm text-gray-700">Require at least one uppercase letter</label>
                    </div>

                    <div class="flex items-center">
                        <input id="require_number" name="require_number" type="checkbox" checked class="h-4 w-4 text-usepmaroon focus:ring-usepmaroon border-gray-300 rounded">
                        <label for="require_number" class="ml-2 block text-sm text-gray-700">Require at least one number</label>
                    </div>

                    <div class="flex items-center">
                        <input id="require_special" name="require_special" type="checkbox" checked class="h-4 w-4 text-usepmaroon focus:ring-usepmaroon border-gray-300 rounded">
                        <label for="require_special" class="ml-2 block text-sm text-gray-700">Require at least one special character</label>
                    </div>

                    <div class="flex items-center">
                        <input id="prevent_reuse" name="prevent_reuse" type="checkbox" class="h-4 w-4 text-usepmaroon focus:ring-usepmaroon border-gray-300 rounded">
                        <label for="prevent_reuse" class="ml-2 block text-sm text-gray-700">Prevent reuse of previous passwords</label>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Account Lockout</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="max_login_attempts" class="block text-sm font-medium text-gray-700 mb-1">Maximum Login Attempts</label>
                        <input type="number" id="max_login_attempts" name="max_login_attempts" min="1" max="10" value="5" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                    </div>

                    <div>
                        <label for="lockout_duration" class="block text-sm font-medium text-gray-700 mb-1">Lockout Duration (Minutes)</label>
                        <input type="number" id="lockout_duration" name="lockout_duration" min="5" max="1440" value="30" class="w-full rounded-md border-gray-300 shadow-sm focus:border-usepmaroon focus:ring focus:ring-usepmaroon focus:ring-opacity-50">
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Reset to Defaults</button>
                <button type="submit" class="px-4 py-2 bg-usepmaroon text-white rounded-md hover:bg-usepmaroon/90">Save Settings</button>
            </div>
        </form>
    </div>
</div>
