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
    </div>
    <!-- Electronic Cover Section at Top -->
    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
        <label class="block font-medium text-sm text-gray-700 mb-2">Electronic Cover</label>
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Cover Preview -->
            <div class="w-full md:w-1/4">
                <div class="border-2 border-dashed border-gray-300 rounded-lg h-48 bg-gray-100 flex items-center justify-center">
                    <div id="coverPreview" class="text-center p-4">
                        <i class="fas fa-image text-4xl text-gray-400 mb-2"></i>
                        <p class="text-sm text-gray-500">Cover preview will appear here</p>
                    </div>
                    <img id="coverImage" src="" class="hidden w-full h-full object-contain" alt="Electronic Cover">
                </div>
            </div>

            <!-- Upload Options -->
            <!-- Upload/Capture Options -->
            <div class="flex-1 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Upload Cover</label>
                    <div class="flex items-center space-x-2">
                        <input type="file" id="coverUpload" accept="image/*" class="flex-1 border border-gray-300 rounded px-3 py-2 text-sm">
                        <button type="button" onclick="document.getElementById('coverUpload').click()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded text-sm">
                            <i class="fas fa-upload mr-1"></i> Browse
                        </button>
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Capture Cover</label>
                    <div class="flex items-center space-x-2">
                        <input type="text" placeholder="Or enter image URL" class="flex-1 border border-gray-300 rounded px-3 py-2 text-sm">
                        <button type="button" class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-4 py-2 rounded text-sm">
                            <i class="fas fa-camera mr-1"></i> Capture
                        </button>
                    </div>
                </div>

                <div class="text-xs text-gray-500">
                    <p>Supported formats: JPG, PNG (Max 5MB)</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Form Fields -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block font-medium text-sm text-gray-700">Accession Number</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Title</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Author</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Collection</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Copyright Date</label>
            <input type="date" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Duration</label>
            <input type="text" placeholder="e.g. 1 hr 30 mins" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Remarks</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>

        <div>
            <label class="block font-medium text-sm text-gray-700">Subject</label>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2 text-sm" rows="2"></textarea>
        </div>

        <div class="md:col-span-2">
            <div class="flex justify-between items-center mb-2">
                <label class="block font-medium text-sm text-gray-700">Summary</label>
                <button type="button" class="text-sm bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded">
                    <i class="fas fa-scanner mr-1"></i>Scan Summary
                </button>
            </div>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2 text-sm" rows="4" placeholder="Enter detailed summary here..."></textarea>
        </div>
    </div>
</form>
