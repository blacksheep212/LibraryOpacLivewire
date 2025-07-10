<form class="space-y-6">
    <div class="flex flex-col sm:flex-row flex-wrap items-center gap-2 md:gap-4 ">
        <div class="relative w-full md:w-96">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input type="text" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm input-focus transition" placeholder="Search books...">
        </div>
        <div class="flex flex-col sm:flex-row items-center gap-2 sm:gap-4 w-full sm:w-auto">
            <!-- Search Button -->
            <button class="relative group px-4 py-2.5 bg-usepmaroon text-white rounded-lg hover:bg-usepmaroon/90 flex items-center justify-center shadow-sm transition-all hover:shadow-md w-full sm:w-auto">
                <i class="fas fa-search sm:mr-2"></i>
                <span class="hidden sm:inline">Search</span>
                <span class="sm:hidden absolute inset-0 flex items-center justify-center">
            <i class="fas fa-search"></i>
        </span>
            </button>

            <!-- Spacer - only on desktop -->
            <div class="hidden sm:block flex-grow"></div>

            <!-- Scan Button -->
            <button class="relative group px-4 py-2.5 bg-usepmaroon text-white rounded-lg hover:bg-usepmaroon/90 flex items-center justify-center shadow-sm transition-all hover:shadow-md w-full sm:w-auto">
                <i class="fas fa-barcode sm:mr-2"></i>
                <span class="hidden sm:inline">Scan</span>
                <span class="sm:hidden absolute inset-0 flex items-center justify-center">
            <i class="fas fa-barcode"></i>
        </span>
            </button>
        </div>
        </button>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block font-medium text-sm text-gray-700">Accession Number</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Call Number</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Title</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Adviser</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">School</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Course</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Location</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Place</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Type</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="">Select Remarks</option>
                <option> Type 1</option>
                <option> Type 2</option>
                <option> Type 3</option>
                <option> Type 4</option>
                <option> Type 5</option>
            </select>
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Year</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2" />
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Remarks</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2">
                <option value="">Select Remarks</option>
                <option> Remarks 1</option>
                <option> Remarks 2</option>
                <option> Remarks 3</option>
                <option> Remarks 4</option>
                <option> Remarks 5</option>
            </select>
        </div>
        <div class="md:col-span-2">
            <div class="flex justify-between items-center mb-2">
                <label class="block font-medium text-sm text-gray-700">Table of Contents</label>
                <button type="button" class="text-sm bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded">
                    <i class=""></i>Scan Contents
                </button>
            </div>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2 text-sm" rows="4"></textarea>
        </div>
        <div class="md:col-span-2">
            <div class="flex justify-between items-center mb-2">
                <label class="block font-medium text-sm text-gray-700">Abstract/label</label>
                <button type="button" class="text-sm bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded">
                    <i class=""></i>Scan Abstract</i>
                </button>
            </div>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2 text-sm" rows="4"></textarea>
        </div>
    </div>
</form>
