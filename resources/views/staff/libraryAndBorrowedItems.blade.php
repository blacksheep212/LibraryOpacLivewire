<div id="add-content">
    <div class="desktop-tabs bg-gray-100 rounded-lg p-1 mb-6 overflow-hidden hidden md:block">
        <div class="flex">
            <button data-tab="libraryItems" class="desktop-tab flex-1 py-3 px-4 text-center active-tab">
                <i class="fas fa-book mr-2"></i>Library Items
            </button>
            <button data-tab="borrowedItems" class="desktop-tab flex-1 py-3 px-4 text-center">
                <i class="fas fa-laptop-code mr-2"></i>Borrowed Items
            </button>
        </div>
    </div>
    <div class="mobile-dropdown mb-6 block md:hidden">
        <button class="w-full bg-gray-100 py-3 px-4 rounded-lg flex justify-between items-center border border-gray-300">
            <span id="mobile-tab-label">
                <i class="fas fa-book mr-2"></i>Library Items
            </span>
            <i id="dropdown-chevron" class="fas fa-chevron-down transition-transform"></i>
        </button>
        <div id="mobile-dropdown-content" class="mobile-dropdown-content bg-white border border-gray-200 rounded-b-lg shadow-sm hidden">
            <button data-tab="libraryItems" class="mobile-tab-option w-full text-left py-3 px-4 flex items-center border-b border-gray-100">
                <i class="fas fa-book mr-3 text-usepmaroon"></i>Library Items
                <span id="mobile-tab-1-check" class="ml-auto text-usepmaroon">
                    <i class="fas fa-check"></i>
                </span>
            </button>
            <button data-tab="borrowedItems" class="mobile-tab-option w-full text-left py-3 px-4 flex items-center">
                <i class="fas fa-laptop-code mr-3 text-usepmaroon"></i>Borrowed Items
                <span id="mobile-tab-2-check" class="ml-auto text-usepmaroon opacity-0">
                    <i class="fas fa-check"></i>
                </span>
            </button>
        </div>
    </div>

    <div id="tab-content" class="p-4 border border-gray-200 rounded-lg">
        <!-- Content will be loaded here -->
    </div>
</div>

<script>
    function initAddTabs(container) {
        let activeTab = 'libraryItems';
        const desktopTabs = container.querySelectorAll('.desktop-tab');
        const mobileTabOptions = container.querySelectorAll('.mobile-tab-option');
        const mobileDropdownButton = container.querySelector('.mobile-dropdown button');
        const mobileDropdownContent = container.querySelector('#mobile-dropdown-content');
        const dropdownChevron = container.querySelector('#dropdown-chevron');
        const mobileTabLabel = container.querySelector('#mobile-tab-label');
        const tabContent = container.querySelector('#tab-content');

        const tabData = {
            libraryItems: {
                title: "Library Items",
                icon: "fa-book",
                content: `
                    <div class="mb-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                            <div class="grid grid-cols-1 md:grid-cols-5 gap-2 w-full">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Start Year</label>
                                    <select class="w-full border border-gray-300 rounded px-3 py-2">
                                        <option>2025</option>
                                        <option>2024</option>
                                        <option>2023</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">End Year</label>
                                    <select class="w-full border border-gray-300 rounded px-3 py-2">
                                        <option>2025</option>
                                        <option>2024</option>
                                        <option>2023</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Location</label>
                                    <select class="w-full border border-gray-300 rounded px-3 py-2">
                                        <option>All</option>
                                        <option>Main Library</option>
                                        <option>Branch 1</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Category</label>
                                    <select class="w-full border border-gray-300 rounded px-3 py-2">
                                        <option>All</option>
                                        <option>Books</option>
                                        <option>Electronic</option>
                                        <option>Periodical</option>
                                        <option>Thesis</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Status</label>
                                    <select class="w-full border border-gray-300 rounded px-3 py-2">
                                        <option>All</option>
                                        <option>Available</option>
                                        <option>Unavailable</option>
                                    </select>
                                </div>
                            </div>
                           <div class="flex items-end h-full pt-5">
                             <button class="bg-usepmaroon text-white px-4 py-2 rounded hover:bg-red-900 whitespace-nowrap ">
                              Generate Report
                            </button>
                         </div>
                        </div>

                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                            <div class="relative w-full md:w-1/3">
                                <input type="text" placeholder="Search..." class="w-full border border-gray-300 rounded px-3 py-2 pl-10">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-gray-600">Select format:</span>
                                <select class="border border-gray-300 rounded px-3 py-2">
                                    <option>CSV</option>
                                    <option>Excel</option>
                                    <option>PDF</option>
                                </select>
                                <button class="bg-usepgold text-usepmaroon px-4 py-2 rounded hover:bg-yellow-500">
                                    Download
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="desktop-tabs bg-gray-100 rounded-lg p-1 mb-6 overflow-hidden hidden md:block">
                        <div class="flex">
                            <button data-subtab="books" class="sub-desktop-tab flex-1 py-3 px-4 text-center sub-active-tab">
                                <i class="fas fa-book mr-2"></i>Books
                            </button>
                            <button data-subtab="electronic" class="sub-desktop-tab flex-1 py-3 px-4 text-center">
                                <i class="fas fa-laptop-code mr-2"></i>Electronic
                            </button>
                            <button data-subtab="periodical" class="sub-desktop-tab flex-1 py-3 px-4 text-center">
                                <i class="fas fa-newspaper mr-2"></i>Periodical
                            </button>
                            <button data-subtab="thesis" class="sub-desktop-tab flex-1 py-3 px-4 text-center">
                                <i class="fas fa-graduation-cap mr-2"></i>Thesis
                            </button>
                        </div>
                    </div>

                    <div class="sub-mobile-dropdown mb-6 block md:hidden">
                        <button class="w-full bg-gray-100 py-3 px-4 rounded-lg flex justify-between items-center border border-gray-300">
                            <span id="sub-mobile-tab-label">
                                <i class="fas fa-book mr-2"></i>Books
                            </span>
                            <i id="sub-dropdown-chevron" class="fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div id="sub-mobile-dropdown-content" class="sub-mobile-dropdown-content bg-white border border-gray-200 rounded-b-lg shadow-sm hidden">
                            <button data-subtab="books" class="sub-mobile-tab-option w-full text-left py-3 px-4 flex items-center border-b border-gray-100">
                                <i class="fas fa-book mr-3 text-usepmaroon"></i>Books
                                <span id="sub-mobile-tab-1-check" class="ml-auto text-usepmaroon">
                                    <i class="fas fa-check"></i>
                                </span>
                            </button>
                            <button data-subtab="electronic" class="sub-mobile-tab-option w-full text-left py-3 px-4 flex items-center border-b border-gray-100">
                                <i class="fas fa-laptop-code mr-3 text-usepmaroon"></i>Electronic
                                <span id="sub-mobile-tab-2-check" class="ml-auto text-usepmaroon opacity-0">
                                    <i class="fas fa-check"></i>
                                </span>
                            </button>
                            <button data-subtab="periodical" class="sub-mobile-tab-option w-full text-left py-3 px-4 flex items-center border-b border-gray-100">
                                <i class="fas fa-newspaper mr-3 text-usepmaroon"></i>Periodical
                                <span id="sub-mobile-tab-3-check" class="ml-auto text-usepmaroon opacity-0">
                                    <i class="fas fa-check"></i>
                                </span>
                            </button>
                            <button data-subtab="thesis" class="sub-mobile-tab-option w-full text-left py-3 px-4 flex items-center">
                                <i class="fas fa-graduation-cap mr-3 text-usepmaroon"></i>Thesis
                                <span id="sub-mobile-tab-4-check" class="ml-auto text-usepmaroon opacity-0">
                                    <i class="fas fa-check"></i>
                                </span>
                            </button>
                        </div>
                    </div>

                    <div id="sub-tab-content">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Accession Number</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Call Number</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Book Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Classification</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Place of Publication</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publisher</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Copyright Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">ACC-001</td>
                                        <td class="px-6 py-4 whitespace-nowrap">CN-001</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Introduction to Computer Science</td>
                                        <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Computer Science Basics</td>
                                        <td class="px-6 py-4 whitespace-nowrap">QA76</td>
                                        <td class="px-6 py-4 whitespace-nowrap">New York</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Tech Publishers</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2022</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">ACC-002</td>
                                        <td class="px-6 py-4 whitespace-nowrap">CN-002</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Advanced Programming</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Jane Smith</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Programming Series</td>
                                        <td class="px-6 py-4 whitespace-nowrap">QA76.6</td>
                                        <td class="px-6 py-4 whitespace-nowrap">San Francisco</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Code Masters</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2021</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                `
            },
            borrowedItems: {
                title: "Borrowed Items",
                icon: "fa-laptop-code",
                content: `
                    <div class="mb-6">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 w-full">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Start Date</label>
                                    <input type="date" class="w-full border border-gray-300 rounded px-3 py-2">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">End Date</label>
                                    <input type="date" class="w-full border border-gray-300 rounded px-3 py-2">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Filter</label>
                                    <select class="w-full border border-gray-300 rounded px-3 py-2">
                                        <option>All</option>
                                        <option>TEMP1</option>
                                        <option>TEMP3</option>
                                    </select>
                                </div>

                                   <div class="flex items-end h-full md:pt-5">
                                     <button class="bg-usepmaroon text-white px-4 py-2 rounded hover:bg-red-900 whitespace-nowrap "> Generate Report </button>
                                   </div>
                            </div>
                        </div>

                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
                            <div class="relative w-full md:w-1/3">
                                <input type="text" placeholder="Search..." class="w-full border border-gray-300 rounded px-3 py-2 pl-10">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-gray-600">Select format:</span>
                                <select class="border border-gray-300 rounded px-3 py-2">
                                    <option>CSV</option>
                                    <option>Excel</option>
                                    <option>PDF</option>
                                </select>
                                <button class="bg-usepgold text-usepmaroon px-4 py-2 rounded hover:bg-yellow-500">
                                    Download
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="pt-4 mb-4">
                        <button type="button" class="bg-usepmaroon text-white px-6 py-2 rounded hover:bg-red-900">

                        </button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Accession Number</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Borrowed</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Returned</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Staff Incharge</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Borrower's Name</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">ACC-001</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Introduction to Computer Science</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Book</td>
                                    <td class="px-6 py-4 whitespace-nowrap">2023-05-15</td>
                                    <td class="px-6 py-4 whitespace-nowrap">2023-06-01</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Ms. Rodriguez</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Juan Dela Cruz</td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">ACC-002</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Advanced Programming</td>
                                    <td class="px-6 py-4 whitespace-nowrap">E-Book</td>
                                    <td class="px-6 py-4 whitespace-nowrap">2023-05-20</td>
                                    <td class="px-6 py-4 whitespace-nowrap">-</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Mr. Smith</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Maria Santos</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                `
            }
        };

        function updateTabContent(tabName) {
            const tab = tabData[tabName];
            tabContent.innerHTML = tab.content;

            // Initialize subtabs if they exist
            if (tabName === 'libraryItems') {
                initSubTabs(container);
            }
        }

        function initSubTabs(container) {
            let activeSubTab = 'books';
            const subDesktopTabs = container.querySelectorAll('.sub-desktop-tab');
            const subMobileTabOptions = container.querySelectorAll('.sub-mobile-tab-option');
            const subMobileDropdownButton = container.querySelector('.sub-mobile-dropdown button');
            const subMobileDropdownContent = container.querySelector('#sub-mobile-dropdown-content');
            const subDropdownChevron = container.querySelector('#sub-dropdown-chevron');
            const subMobileTabLabel = container.querySelector('#sub-mobile-tab-label');
            const subTabContent = container.querySelector('#sub-tab-content');

            const subTabData = {
                books: {
                    title: "Books",
                    icon: "fa-book",
                    content: `
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Accession Number</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Call Number</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Book Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Classification</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Place of Publication</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publisher</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Copyright Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">ACC-001</td>
                                        <td class="px-6 py-4 whitespace-nowrap">CN-001</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Introduction to Computer Science</td>
                                        <td class="px-6 py-4 whitespace-nowrap">John Doe</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Computer Science Basics</td>
                                        <td class="px-6 py-4 whitespace-nowrap">QA76</td>
                                        <td class="px-6 py-4 whitespace-nowrap">New York</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Tech Publishers</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2022</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">ACC-002</td>
                                        <td class="px-6 py-4 whitespace-nowrap">CN-002</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Advanced Programming</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Jane Smith</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Programming Series</td>
                                        <td class="px-6 py-4 whitespace-nowrap">QA76.6</td>
                                        <td class="px-6 py-4 whitespace-nowrap">San Francisco</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Code Masters</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2021</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    `
                },
                electronic: {
                    title: "Electronic",
                    icon: "fa-laptop-code",
                    content: `
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Accession Number</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Call Number</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Book Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Classification</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Place of Publication</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publisher</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Copyright Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">E-001</td>
                                        <td class="px-6 py-4 whitespace-nowrap">ECN-001</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Digital Systems</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Robert Johnson</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Electronics Series</td>
                                        <td class="px-6 py-4 whitespace-nowrap">TK7868</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Boston</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Digital Press</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2020</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    `
                },
                periodical: {
                    title: "Periodical",
                    icon: "fa-newspaper",
                    content: `
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Accession Number</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Call Number</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Book Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Classification</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Place of Publication</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publisher</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Copyright Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">P-001</td>
                                        <td class="px-6 py-4 whitespace-nowrap">PCN-001</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Science Journal</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Various</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Science Monthly</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Q1</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Chicago</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Science Press</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2023</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    `
                },
                thesis: {
                    title: "Thesis",
                    icon: "fa-graduation-cap",
                    content: `
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Accession Number</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Call Number</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Book Title</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Classification</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Place of Publication</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publisher</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Copyright Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">T-001</td>
                                        <td class="px-6 py-4 whitespace-nowrap">TCN-001</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Machine Learning Applications</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Alex Wong</td>
                                        <td class="px-6 py-4 whitespace-nowrap">CS Thesis Collection</td>
                                        <td class="px-6 py-4 whitespace-nowrap">QA76.87</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Manila</td>
                                        <td class="px-6 py-4 whitespace-nowrap">University Press</td>
                                        <td class="px-6 py-4 whitespace-nowrap">2022</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    `
                }
            };

            function updateSubTabContent(subTabName) {
                const subTab = subTabData[subTabName];
                subTabContent.innerHTML = subTab.content;
            }

            function updateSubMobileTabSelection(subTabName) {
                const subTab = subTabData[subTabName];
                subMobileTabLabel.innerHTML = `<i class="fas ${subTab.icon} mr-2"></i>${subTab.title}`;
                subMobileTabOptions.forEach((option, index) => {
                    const checkSpan = container.querySelector(`#sub-mobile-tab-${index+1}-check`);
                    if (option.getAttribute('data-subtab') === subTabName) {
                        checkSpan.classList.remove('opacity-0');
                    } else {
                        checkSpan.classList.add('opacity-0');
                    }
                });
            }

            function toggleSubMobileDropdown() {
                subMobileDropdownContent.classList.toggle('hidden');
                subDropdownChevron.classList.toggle('rotate-180');
            }

            function switchSubTab(subTabName) {
                if (activeSubTab === subTabName) return;
                activeSubTab = subTabName;
                subDesktopTabs.forEach(tab => {
                    if (tab.getAttribute('data-subtab') === subTabName) {
                        tab.classList.add('sub-active-tab');
                    } else {
                        tab.classList.remove('sub-active-tab');
                    }
                });
                updateSubMobileTabSelection(subTabName);
                updateSubTabContent(subTabName);
            }

            subDesktopTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const subTabName = this.getAttribute('data-subtab');
                    switchSubTab(subTabName);
                });
            });

            subMobileTabOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const subTabName = this.getAttribute('data-subtab');
                    switchSubTab(subTabName);
                    toggleSubMobileDropdown();
                });
            });

            subMobileDropdownButton.addEventListener('click', toggleSubMobileDropdown);

            // Initialize first subtab
            updateSubMobileTabSelection(activeSubTab);
            updateSubTabContent(activeSubTab);
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
    .desktop-tab, .sub-desktop-tab {
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .desktop-tab.active-tab, .sub-desktop-tab.sub-active-tab {
        background-color: white;
        color: #800000;
        font-weight: 600;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    .mobile-dropdown-content, .sub-mobile-dropdown-content {
        transition: all 0.3s ease;
    }
    .rotate-180 {
        transform: rotate(180deg);
    }
    @media (min-width: 768px) {
        .mobile-dropdown, .sub-mobile-dropdown {
            display: none;
        }
        .desktop-tabs, .sub-desktop-tabs {
            display: block;
        }
    }
</style>