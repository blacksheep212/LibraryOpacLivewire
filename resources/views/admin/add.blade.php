<!-- add.html -->
<div id="add-content" >
    <h2 class="text-2xl font-bold text-usepmaroon mb-4">Add</h2>
    <div class="desktop-tabs bg-gray-100 rounded-lg p-1 mb-6 overflow-hidden hidden md:block">
        <div class="flex">
            <button data-tab="books" class="desktop-tab flex-1 py-3 px-4 text-center active-tab">
                <i class="fas fa-book mr-2"></i>Books
            </button>
            <button data-tab="electronic" class="desktop-tab flex-1 py-3 px-4 text-center">
                <i class="fas fa-laptop-code mr-2"></i>Electronic
            </button>
            <button data-tab="periodical" class="desktop-tab flex-1 py-3 px-4 text-center">
                <i class="fas fa-newspaper mr-2"></i>Periodical
            </button>
            <button data-tab="thesis" class="desktop-tab flex-1 py-3 px-4 text-center">
                <i class="fas fa-graduation-cap mr-2"></i>Thesis
            </button>
        </div>
    </div>
    <div class="mobile-dropdown mb-6 block md:hidden">
        <button class="w-full bg-gray-100 py-3 px-4 rounded-lg flex justify-between items-center border border-gray-300">
            <span id="mobile-tab-label">
                <i class="fas fa-book mr-2"></i>Books
            </span>
            <i id="dropdown-chevron" class="fas fa-chevron-down transition-transform"></i>
        </button>
        <div id="mobile-dropdown-content" class="mobile-dropdown-content bg-white border border-gray-200 rounded-b-lg shadow-sm hidden">
            <button data-tab="books" class="mobile-tab-option w-full text-left py-3 px-4 flex items-center border-b border-gray-100">
                <i class="fas fa-book mr-3 text-usepmaroon"></i>Books
                <span id="mobile-tab-1-check" class="ml-auto text-usepmaroon">
                    <i class="fas fa-check"></i>
                </span>
            </button>
            <button data-tab="electronic" class="mobile-tab-option w-full text-left py-3 px-4 flex items-center border-b border-gray-100">
                <i class="fas fa-laptop-code mr-3 text-usepmaroon"></i>Electronic
                <span id="mobile-tab-2-check" class="ml-auto text-usepmaroon opacity-0">
                    <i class="fas fa-check"></i>
                </span>
            </button>
            <button data-tab="periodical" class="mobile-tab-option w-full text-left py-3 px-4 flex items-center border-b border-gray-100">
                <i class="fas fa-newspaper mr-3 text-usepmaroon"></i>Periodical
                <span id="mobile-tab-3-check" class="ml-auto text-usepmaroon opacity-0">
                    <i class="fas fa-check"></i>
                </span>
            </button>
            <button data-tab="thesis" class="mobile-tab-option w-full text-left py-3 px-4 flex items-center">
                <i class="fas fa-graduation-cap mr-3 text-usepmaroon"></i>Thesis
                <span id="mobile-tab-4-check" class="ml-auto text-usepmaroon opacity-0">
                    <i class="fas fa-check"></i>
                </span>
            </button>
        </div>
    </div>

    <div id="tab-content" class="p-4 border border-gray-200 rounded-lg">
        Loading books content...
    </div>
</div>
<!-- Form Actions -->
<div class="pt-6 flex justify-end space-x-3">
    <button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded text-sm">
        <i class="fas fa-times mr-2"></i>Cancel
    </button>
    <button type="submit" class="bg-usepmaroon hover:bg-red-900 text-white px-6 py-2 rounded text-sm">
        <i class="fas fa-save mr-2"></i>Save
    </button>
</div>

<script>
    function initAddTabs(container) {
        let activeTab = 'books';
        const desktopTabs = container.querySelectorAll('.desktop-tab');
        const mobileTabOptions = container.querySelectorAll('.mobile-tab-option');
        const mobileDropdownButton = container.querySelector('.mobile-dropdown button');
        const mobileDropdownContent = container.querySelector('#mobile-dropdown-content');
        const dropdownChevron = container.querySelector('#dropdown-chevron');
        const mobileTabLabel = container.querySelector('#mobile-tab-label');
        const tabContent = container.querySelector('#tab-content');
        const tabData = {
            books: {
                title: "Books",
                icon: "fa-book",
                content: `
        <form class="space-y-6">
    <!-- Book Cover Section at Top -->
    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
        <label class="block font-medium text-sm text-gray-700 mb-2">Book Cover</label>
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Cover Preview -->
            <div class="w-full md:w-1/4">
                <div class="border-2 border-dashed border-gray-300 rounded-lg h-48 bg-gray-100 flex items-center justify-center">
                    <div id="coverPreview" class="text-center p-4">
                        <i class="fas fa-book text-4xl text-gray-400 mb-2"></i>
                        <p class="text-sm text-gray-500">Cover preview will appear here</p>
                    </div>
                    <img id="coverImage" src="" class="hidden w-full h-full object-contain" alt="Book Cover">
                </div>
            </div>

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
            <label class="block font-medium text-sm text-gray-700">Editor</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Date Received</label>
            <input type="date" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Year Published</label>
            <input type="number" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Edition</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Series Title</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Publisher</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Place of Publisher</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">ISBN</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">DDC</label>
            <select class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
                <option value="">Select DDC</option>
                <option>000 – Generalities</option>
                <option>100 – Philosophy & Psychology</option>
                <option>200 – Religion</option>
                <option>300 – Social Sciences</option>
                <option>400 – Language</option>
                <option>500 – Science</option>
                <option>600 – Technology</option>
                <option>700 – Arts & Recreation</option>
                <option>800 – Literature</option>
                <option>900 – History & Geography</option>
            </select>
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Call Number</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Location</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Location Symbol</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Source</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Cover Type</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Purchase Account</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Remarks</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
        </div>
        <div>
            <label class="block font-medium text-sm text-gray-700">Subject</label>
            <input type="text" class="w-full border border-gray-300 rounded px-3 py-2 text-sm">
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
    </div>
</form>
    `
            },

            electronic: {
                title: "Electronic",
                icon: "fa-laptop-code",
                content: `
        <form class="space-y-6">
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
    `
            },
            periodical: {
                title: "Periodical",
                icon: "fa-newspaper",
                content: `
        <form class="space-y-4">

         <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
        <label class="block font-medium text-sm text-gray-700 mb-2">Periodical Cover</label>
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
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-sm text-gray-700">Accession Number</label>
                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Title</label>
                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Author</label>
                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Copyright Date</label>
                    <input type="date" class="w-full border border-gray-300 rounded px-3 py-2" />
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
                <div>
                    <label class="block font-medium text-sm text-gray-700">Subject</label>
                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
            </div>
        </form>
    `
        },

            thesis: {
                title: "Thesis",
                icon: "fa-graduation-cap",
                content: `
        <form class="space-y-4">


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
                    <i class=""></i>Scan Abstract
                </button>
            </div>
            <textarea class="w-full border border-gray-300 rounded px-3 py-2 text-sm" rows="4"></textarea>
        </div>
        </form>
    `
            }
        };
        function updateTabContent(tabName) {
            const tab = tabData[tabName];
            tabContent.innerHTML = `
            <h3 class="text-lg font-semibold text-usepmaroon mb-4">${tab.title} Form</h3>
            <div class="text-gray-600">${tab.content}</div>
        `;
        }
        function updateMobileTabSelection(tabName) {
            const tab = tabData[tabName];
            mobileTabLabel.innerHTML = `<i class="fas ${tab.icon} mr-2"></i>${tab.title}`;
            mobileTabOptions.forEach((option, index) => {
                const checkSpan = container.querySelector(`#mobile-tab-${index+1}-check`);
                if (option.getAttribute('data-tab') === tabName) {
                    checkSpan.classList.remove('opacity-0');
                } else {
                    checkSpan.classList.add('opacity-0');
                }
            });
        }
        function toggleMobileDropdown() {
            mobileDropdownContent.classList.toggle('hidden');
            dropdownChevron.classList.toggle('rotate-180');
        }
        function switchTab(tabName) {
            if (activeTab === tabName) return;
            activeTab = tabName;
            desktopTabs.forEach(tab => {
                if (tab.getAttribute('data-tab') === tabName) {
                    tab.classList.add('active-tab');
                } else {
                    tab.classList.remove('active-tab');
                }
            });
            updateMobileTabSelection(tabName);
            updateTabContent(tabName);
        }
        desktopTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabName = this.getAttribute('data-tab');
                switchTab(tabName);
            });
        });
        mobileTabOptions.forEach(option => {
            option.addEventListener('click', function() {
                const tabName = this.getAttribute('data-tab');
                switchTab(tabName);
                toggleMobileDropdown();
            });
        });
        mobileDropdownButton.addEventListener('click', toggleMobileDropdown);
        // Initialize first tab
        updateMobileTabSelection(activeTab);
        updateTabContent(activeTab);
    }
</script>
<style>
    .desktop-tab { transition: all 0.3s ease; cursor: pointer; }
    .desktop-tab.active-tab { background-color: white; color: #800000; font-weight: 600; box-shadow: 0 1px 3px rgba(0,0,0,0.1);}
    .mobile-dropdown-content { transition: all 0.3s ease; }
    .rotate-180 { transform: rotate(180deg);}
    @media (min-width: 768px) {
        .mobile-dropdown { display: none; }
        .desktop-tabs { display: block; }
    }
</style>