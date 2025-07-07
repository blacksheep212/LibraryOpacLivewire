
<div id="add-content">
    <h2 class="text-2xl font-bold text-usepmaroon mb-4">Book Circulation</h2>

    <!-- Desktop Tabs -->
    <div class="desktop-tabs bg-gray-100 rounded-lg p-1 mb-6 overflow-hidden hidden md:block">
        <div class="flex">
            <button data-tab="borrow" class="desktop-tab flex-1 py-3 px-4 text-center active-tab">
                <i class="fas fa-book mr-2"></i>Borrow
            </button>
            <button data-tab="return" class="desktop-tab flex-1 py-3 px-4 text-center">
                <i class="fas fa-laptop-code mr-2"></i>Return
            </button>
        </div>
    </div>

    <!-- Mobile Dropdown -->
    <div class="mobile-dropdown mb-6 block md:hidden">
        <button class="w-full bg-gray-100 py-3 px-4 rounded-lg flex justify-between items-center border border-gray-300">
            <span id="mobile-tab-label">
                <i class="fas fa-book mr-2"></i>Borrow and Return
            </span>
            <i id="dropdown-chevron" class="fas fa-chevron-down transition-transform"></i>
        </button>
        <div id="mobile-dropdown-content" class="mobile-dropdown-content bg-white border border-gray-200 rounded-b-lg shadow-sm hidden">
            <button data-tab="borrow" class="mobile-tab-option w-full text-left py-3 px-4 flex items-center border-b border-gray-100">
                <i class="fas fa-book mr-3 text-usepmaroon"></i>Borrow
                <span id="mobile-tab-1-check" class="ml-auto text-usepmaroon">
                    <i class="fas fa-check"></i>
                </span>
            </button>
            <button data-tab="return" class="mobile-tab-option w-full text-left py-3 px-4 flex items-center border-b border-gray-100">
                <i class="fas fa-laptop-code mr-3 text-usepmaroon"></i>Return
                <span id="mobile-tab-2-check" class="ml-auto text-usepmaroon opacity-0">
                    <i class="fas fa-check"></i>
                </span>
            </button>
        </div>
    </div>

    <!-- Tab Content -->
    <div id="tab-content" class="p-4 border border-gray-200 rounded-lg">
        @if($activeTab === 'borrow')
            @include('staff.partials.borrowForm')
        @else
            @include('staff.partials.returnForm')
        @endif
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-end pt-4 gap-4">
        <button type="button" class="bg-gray-200 text-gray-800 px-6 py-2 rounded hover:bg-gray-300">
            <i class="fas fa-times mr-2"></i>Clear
        </button>
        <button type="submit" form="{{ $activeTab === 'borrow' ? 'borrow-form' : 'return-form' }}"
                class="bg-usepmaroon text-white px-6 py-2 rounded hover:bg-red-900">
            <i class="fas fa-save mr-2"></i>Save
        </button>
    </div>
</div>

@push('scripts')
<script>
    function initAddTabs(container) {
        let activeTab = 'borrow';
        const desktopTabs = container.querySelectorAll('.desktop-tab');
        const mobileTabOptions = container.querySelectorAll('.mobile-tab-option');
        const mobileDropdownButton = container.querySelector('.mobile-dropdown button');
        const mobileDropdownContent = container.querySelector('#mobile-dropdown-content');
        const dropdownChevron = container.querySelector('#dropdown-chevron');
        const mobileTabLabel = container.querySelector('#mobile-tab-label');
        const tabContent = container.querySelector('#tab-content');
        const tabData = {
            borrow: {
                title: "Borrow",
                icon: "fa-book",
                content: `@include('staff/partials/borrowForm')`
            },

            return: {
                title: "Return",
                icon: "fa-laptop-code",
                content: `@include('staff/partials/returnForm')`
            }
        };
        <form class="space-y-4">
        <div class="pt-4 flex">
        <button type="submit" class="bg-usepmaroon text-white px-6 py-2 rounded hover:bg-red-900">
             <i class="fas fa-barcode mr-2"></i>Scan
        </button>
    </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-sm text-gray-700">Accession Number</label>
                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Borrower's ID</label>
                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Details</label>
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Borrower's Information</label>
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Title</label>
                    <input type="text" placeholder="Title" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Name</label>
                    <input type="text" placeholder="Name" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Author</label>
                    <input type="text" placeholder="Author" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Program</label>
                    <input type="text" placeholder="Program" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Location</label>
                    <input type="text" placeholder="Program" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">User Type</label>
                    <input type="text" placeholder="User Type" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Status</label>
                    <input type="text" placeholder="Status" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
            </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-sm text-gray-700">Date Borrowed</label>
                    <input type="date" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Due Borrowed</label>
                    <input type="date" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                </div>
                <!-- Buttons -->
    </div>
        </form>
    `
            },

            return: {
                title: "Return",
                icon: "fa-laptop-code",
                content: `
        <form class="space-y-4">
        <div class="pt-4 flex">
        <button type="submit" class="bg-usepmaroon text-white px-6 py-2 rounded hover:bg-red-900">
             <i class="fas fa-barcode mr-2"></i>Scan
        </button>
    </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium text-sm text-gray-700">Accession Number</label>
                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Borrower's ID</label>
                    <input type="text" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Details</label>
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Borrower's Information</label>
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Title</label>
                    <input type="text" placeholder="Title" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Name</label>
                    <input type="text" placeholder="Name" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Category Number</label>
                    <input type="text" placeholder="Category Number" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Program</label>
                    <input type="text" placeholder="Program" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Date Borrowed</label>
                    <input type="date" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">User Type</label>
                    <input type="text" placeholder="User Type" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
            </div>

                <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mt-10">
                <div>
                    <label class="block font-medium text-sm text-gray-700">Due Borrowed</label>
                    <input type="date" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Day Elapsed</label>
                    <input type="text" placeholder="Day Elapsed" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Penalty</label>
                    <input type="text" placeholder="Penalty" class="w-full border border-gray-300 rounded px-3 py-2" />
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Penalty Staus</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="">Penalty</option>
                        <option> Penalty 1</option>
                        <option> Penalty 2</option>
                        <option> Penalty 3</option>
                        <option> Penalty 4</option>
                        <option> Penalty 5</option>
                    </select>
                </div>
                <div>
                    <label class="block font-medium text-sm text-gray-700">Books Staus</label>
                    <select class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="">Books</option>
                        <option> Condition</option>
                        <option> Good</option>
                        <option> Not Good</option>
                    </select>
                </div>
                </div>
                <!-- Buttons -->
    </div>
        </form>
    `
            },

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
