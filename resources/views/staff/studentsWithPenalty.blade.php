
<div id="studentsWithPenalty-content" >
    <h2 class="text-2xl font-bold text-usepmaroon mb-4"></h2>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Students with Penalty</h1>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <table class="min-w-full
                    <!-- Table Header -->
                    divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Student ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penalty Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2023-12345</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">John Doe</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Late Return</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$5.00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="text-usepmaroon hover:text-usepmaroon/80 focus:outline-none focus:ring-2 focus:ring-usepmaroon rounded-lg px-3 py-1.5">Pay</button>
                        </td>
                    </tr>
                    <!-- Repeat for more students -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2023-67890</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Jane Smith</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Damaged Book</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$10.00</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button class="text-usepmaroon hover:text-usepmaroon/80 focus:outline-none focus:ring-2 focus:ring-usepmaroon rounded-lg px-3 py-1.5">Pay</button>
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            <button class="px-4 py-2 bg-usepmaroon text-white rounded-lg hover:bg-usepmaroon/80 focus:outline-none focus:ring-2 focus:ring-usepmaroon transition">Add New Penalty</button>