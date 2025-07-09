<!-- update.html -->
<div id="add-content" >
    <h2 class="text-2xl font-bold text-usepmaroon mb-4">Update</h2>
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
        <i class="fas fa-times mr-2"></i>Clear
    </button>
    <button type="submit" class="bg-usepmaroon hover:bg-red-900 text-white px-6 py-2 rounded text-sm">
        <i class="fas fa-save mr-2"></i>Update
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
                url: "{{ route('admin.update.book') }}"
            },

            electronic: {
                title: "Electronic",
                icon: "fa-laptop-code",
                url: "{{ route('admin.update.electronic') }}"
            },
            periodical: {
                title: "Periodical",
                icon: "fa-newspaper",
                url: "{{ route('admin.update.periodical') }}"
            },

            thesis: {
                title: "Thesis",
                icon: "fa-graduation-cap",
                url: "{{ route('admin.update.thesis') }}"
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
