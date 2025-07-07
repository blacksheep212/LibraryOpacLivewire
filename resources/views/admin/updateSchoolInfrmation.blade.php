<style>
    tr:nth-child(even) { background-color: #dddddd;}
    table{border-radius: 20px;}
</style>


<div id="add-content">
    <h2 class="text-2xl font-bold text-usepmaroon mb-4">Update School Information</h2>

    <!-- Desktop Tabs -->
    <div class="desktop-tabs bg-gray-100 rounded-lg p-1 mb-6 overflow-hidden hidden md:block">
        <div class="flex">
            <button data-tab="colleges" class="desktop-tab flex-1 py-3 px-4 text-center active-tab">
                <i class="fas fa-building mr-2"></i>Colleges
            </button>
            <button data-tab="departments" class="desktop-tab flex-1 py-3 px-4 text-center">
                <i class="fas fa-sitemap mr-2"></i>Departments
            </button>
            <button data-tab="programs" class="desktop-tab flex-1 py-3 px-4 text-center">
                <i class="fas fa-graduation-cap mr-2"></i>Programs
            </button>
            <button data-tab="office" class="desktop-tab flex-1 py-3 px-4 text-center">
                <i class="fas fa-briefcase mr-2"></i>Office
            </button>
        </div>
    </div>

    <!-- Mobile Dropdown -->
    <div class="mobile-dropdown mb-6 block md:hidden">
        <button class="w-full bg-gray-100 py-3 px-4 rounded-lg flex justify-between items-center border border-gray-300">
            <span id="mobile-tab-label">
                <i class="fas fa-building mr-2"></i>Colleges
            </span>
            <i id="dropdown-chevron" class="fas fa-chevron-down transition-transform"></i>
        </button>
        <div id="mobile-dropdown-content" class="mobile-dropdown-content bg-white border border-gray-200 rounded-b-lg shadow-sm hidden">
            <button data-tab="colleges" class="mobile-tab-option w-full text-left py-3 px-4 flex items-center border-b border-gray-100">
                <i class="fas fa-building mr-3 text-usepmaroon"></i>Colleges
                <span id="mobile-tab-1-check" class="ml-auto text-usepmaroon">
                    <i class="fas fa-check"></i>
                </span>
            </button>
            <button data-tab="departments" class="mobile-tab-option w-full text-left py-3 px-4 flex items-center border-b border-gray-100">
                <i class="fas fa-sitemap mr-3 text-usepmaroon"></i>Departments
                <span id="mobile-tab-2-check" class="ml-auto text-usepmaroon opacity-0">
                    <i class="fas fa-check"></i>
                </span>
            </button>
            <button data-tab="programs" class="mobile-tab-option w-full text-left py-3 px-4 flex items-center border-b border-gray-100">
                <i class="fas fa-graduation-cap mr-3 text-usepmaroon"></i>Programs
                <span id="mobile-tab-3-check" class="ml-auto text-usepmaroon opacity-0">
                    <i class="fas fa-check"></i>
                </span>
            </button>
            <button data-tab="office" class="mobile-tab-option w-full text-left py-3 px-4 flex items-center">
                <i class="fas fa-briefcase mr-3 text-usepmaroon"></i>Office
                <span id="mobile-tab-4-check" class="ml-auto text-usepmaroon opacity-0">
                    <i class="fas fa-check"></i>
                </span>
            </button>
        </div>
    </div>

    <div id="tab-content" class="p-4 border border-gray-200 rounded-lg">
        Loading colleges content...
    </div>
    <div class="flex items-center justify-between mt-6">
        <div class="text-sm text-gray-600">
            Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">12</span> entries
        </div>
        <div class="flex space-x-2">
            <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50">
                Previous
            </button>
            <button class="px-3 py-1 bg-usepmaroon text-white rounded-md hover:bg-usepmaroon/90">
                1
            </button>
            <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50">
                2
            </button>
            <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50">
                3
            </button>
            <button class="px-3 py-1 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-50">
                Next
            </button>
        </div>
    </div>
    <div class="pt-4 flex justify-end">
        <button type="submit" class="bg-usepmaroon text-white px-6 py-2 rounded hover:bg-red-900">
            <i class="fas fa-save mr-2"></i>Save
        </button>
    </div>

</div>

<script>
    function initAddTabs(container) {
        let activeTab = 'colleges';
        const desktopTabs = container.querySelectorAll('.desktop-tab');
        const mobileTabOptions = container.querySelectorAll('.mobile-tab-option');
        const mobileDropdownButton = container.querySelector('.mobile-dropdown button');
        const mobileDropdownContent = container.querySelector('#mobile-dropdown-content');
        const dropdownChevron = container.querySelector('#dropdown-chevron');
        const mobileTabLabel = container.querySelector('#mobile-tab-label');
        const tabContent = container.querySelector('#tab-content');

        const tabData = {
            colleges: {
                title: "Colleges",
                icon: "fa-building",
                content: `
        <form class="space-y-4">

            <div class="flex flex-col sm:flex-row flex-wrap items-center gap-2 md:gap-4">
                <div class="relative w-full md:w-96">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm input-focus transition" placeholder="Search colleges...">
                </div>
                <button class="px-5 py-2.5 bg-usepmaroon text-white rounded-lg hover:bg-usepmaroon/90 flex items-center justify-center shadow-sm transition-all hover:shadow-md">
                    <i class="fas fa-search mr-2"></i>Search
                </button>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-usepmaroon text-white">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">College</th>
                <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">College of Teacher Education and Technology</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">College of Agriculture and Related Sciences</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">School of Medicine</div>
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
    `
            },
            departments: {
                title: "Departments",
                icon: "fa-sitemap",
                content:`
        <form class="space-y-4">

            <div class="flex flex-col sm:flex-row flex-wrap items-center gap-2 md:gap-4">
                <div class="relative w-full md:w-96">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm input-focus transition" placeholder="Search departments...">
                </div>
                <button class="px-5 py-2.5 bg-usepmaroon text-white rounded-lg hover:bg-usepmaroon/90 flex items-center justify-center shadow-sm transition-all hover:shadow-md">
                    <i class="fas fa-search mr-2"></i>Search
                </button>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-usepmaroon text-white">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Department</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">College</th>
                <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Department</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">College of Teacher Education and Technology</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Department</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">College of Agriculture and Related Sciences</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Department</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">School of Medicine</div>
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
    `
            },
            programs: {
                title: "Programs",
                icon: "fa-graduation-cap",
                content: `
        <form class="space-y-4">

            <div class="flex flex-col sm:flex-row flex-wrap items-center gap-2 md:gap-4">
                <div class="relative w-full md:w-96">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm input-focus transition" placeholder="Search programs...">
                </div>
                <button class="px-5 py-2.5 bg-usepmaroon text-white rounded-lg hover:bg-usepmaroon/90 flex items-center justify-center shadow-sm transition-all hover:shadow-md">
                    <i class="fas fa-search mr-2"></i>Search
                </button>
            </div>

            <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-usepmaroon text-white">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Program</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Program Acronym</th>
                <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider">College</th>
                <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Bachelor of Elementary Education</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">BEED</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">College of Teacher Education and Technology</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Bachelor of Early Childhood Education</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">BECED</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">College of Teacher Education and Technology</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Bachelor of Secondary Education</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">BSED</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">College of Teacher Education and Technology</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>

            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Bachelor of Science in Information Technology</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">BSIT</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">College of Teacher Education and Technology</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>

            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Bachelor of Technical-Vocational Teacher Education</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">BTVTED</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">College of Teacher Education and Technology</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>

            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Bachelor of Secondary in Agricultural and Biosystem Engineering</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">BSABE</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">College of Engineering</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>

            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Bachelor of Science in Agriculture</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">BSA</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">College of Agriculture and Related Sciences</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>

            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Bachelor of Science in Forestry</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">BSF</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">College of Agriculture and Related Sciences</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button class="text-usepmaroon hover:text-usepgold">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                </td>
            </tr>

            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">Doctor of Medicine</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">DM</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-semibold text-gray-900">School of Medicine</div>
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
    `
            },

            office: {
                title: "Office",
                icon: "fa-briefcase",
                content: `
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
    `
            }
        };

        function updateTabContent(tabName) {
            const tab = tabData[tabName];
            tabContent.innerHTML = `
                <h3 class="text-lg font-semibold text-usepmaroon mb-4">${tab.title} Management</h3>
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

            // Update desktop tabs
            desktopTabs.forEach(tab => {
                if (tab.getAttribute('data-tab') === tabName) {
                    tab.classList.add('active-tab');
                } else {
                    tab.classList.remove('active-tab');
                }
            });

            // Update mobile dropdown
            updateMobileTabSelection(tabName);

            // Update content
            updateTabContent(tabName);
        }

        // Set up event listeners
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

    // Initialize the tabs when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('add-content');
        initAddTabs(container);
    });
</script>

<style>
    .desktop-tab {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .desktop-tab.active-tab {
        background-color: white;
        color: #800000; /* USEP maroon color */
        font-weight: 600;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .mobile-dropdown-content {
        transition: all 0.3s ease;
    }

    .rotate-180 {
        transform: rotate(180deg);
    }

    @media (min-width: 768px) {
        .mobile-dropdown {
            display: none;
        }
        .desktop-tabs {
            display: block;
        }
    }
</style>