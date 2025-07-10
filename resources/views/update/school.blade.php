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
            <i class="fas fa-save mr-2"></i>Update
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
                url: "{{ route('admin.update.updateCollege') }}"
            },


            departments: {
                title: "Departments",
                icon: "fa-sitemap",
                url: "{{ route('admin.update.updateDepartment') }}"
            },

            programs: {
                title: "Programs",
                icon: "fa-graduation-cap",
                url: "{{ route('admin.update.updateProgram') }}"
            },

            office: {
                title: "Office",
                icon: "fa-briefcase",
                url: "{{ route('admin.update.updateOffice') }}"
            }
        };

        function updateTabContent(tabName) {
            const tab = tabData[tabName];
            tabContent.innerHTML = `<div class="text-gray-600">Loading ${tab.title} form...</div>`;

            if (tab.url) {
                // Load from Laravel route
                fetch(tab.url)
                    .then(response => response.text())
                    .then(html => {
                        tabContent.innerHTML = html;
                    })
                    .catch(() => {
                        tabContent.innerHTML = `<div class="text-red-600">Failed to load ${tab.title} form.</div>`;
                    });
            } else if (tab.render) {
                // Render directly via JS
                tabContent.innerHTML = tab.render();
            }
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
