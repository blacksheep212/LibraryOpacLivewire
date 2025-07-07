<div id="add-content" >
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Staff Clearance Form</h1>
        <form id="clearanceForm" class="space-y-6">
        <!-- Personal Information Section -->
        <div class="bg-white p
</div>
        <div class="rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Personal Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                    <input type="text" name="firstName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                    <input type="text" name="lastName" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm">
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Position</label>
                <input type="text" name="position" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm">
            </div>
        </div>

        <!-- Clearance Details Section -->
        <div class="bg-white p-6 mt-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-4">Clearance Details</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Department</label>
                    <input type="text" name="department" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date of Clearance</label>
                    <input type="date" name="clearanceDate" required class="w-full px-4 py-2 border border-gray