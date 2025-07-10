
<form class="space-y-4">
    <div class="flex flex-col sm:flex-row flex-wrap items-center gap-2 md:gap-4">
        <div class="relative w-full md:w-96">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input type="text" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm input-focus transition" placeholder="Search offices...">
        </div>
        <button class="px-5 py-2.5 bg-usepmaroon text-white rounded-lg hover:bg-usepmaroon/90 flex items-center justify-center shadow-sm transition-all hover:shadow-md">
            <i class="fas fa-search mr-2"></i>Search
        </button>
    </div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-usepmaroon text-white">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Office</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Campus</th>
                <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Office</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Tagum-Mabin(Tagun Unit)</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Office</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Tagum-Mabini(Mabini Unit)</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Office</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Tagum-Mabini (Tagum Unit)</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</form>
