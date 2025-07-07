<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>USEP Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        window.route = (name, params = {}) => {
            return '{{ url("/") }}' + '/' + name.replace('.', '/');
        };
    </script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        usepmaroon: '#800000',
                        usepgold: '#FFD700',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .transition-slow { transition: all 0.3s ease-in-out; }
        .nav-item.active { background-color: rgba(255, 215, 0, 0.2); border-left: 3px solid #FFD700; }
        #sidebar { z-index: 50; }
        #overlay { z-index: 40; }
        #profile-dropdown { z-index: 60; }
        .sidebar-collapsed { width: 80px !important; }
        .sidebar-collapsed .nav-text,
        .sidebar-collapsed .section-title,
        .sidebar-collapsed .logo-text,
        .sidebar-collapsed .badge { display: none; }
        .sidebar-collapsed .toggle-btn { left: 60px; }
        .sidebar-collapsed ~ #main-content { margin-left: 80px !important; }
        .has-submenu { position: relative; }
        .submenu { max-height: 0; overflow: hidden; transition: max-height 0.3s ease; }
        .submenu.open { max-height: 500px; }
        .nav-item:hover { background-color: rgba(255, 215, 0, 0.2) !important; border-left: 3px solid #FFD700; }
        .submenu a { display: block; }
        .submenu a:hover { background-color: rgba(255, 215, 0, 0.2) !important; }
        .profile-dropdown { display: none; opacity: 0; transform: translateY(-10px); transition: opacity 0.2s ease, transform 0.2s ease; }
        .profile-dropdown.show { display: block; opacity: 1; transform: translateY(0); }
        .chevron-btn { pointer-events: auto; }
        .chevron-btn:hover { color: #FFD700; }
        .submenu-parent { cursor: pointer; }
        .submenu-item { padding-left: 2rem; }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
<div class="flex min-h-screen relative">
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-usepmaroon text-white shadow-lg transform -translate-x-full md:translate-x-0 transition-slow flex flex-col z-50">
        <div class="flex items-center justify-between px-6 border-b border-usepgold/50 h-[72px] relative">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/usep-logo-small.png') }}" alt="Logo" class="w-10 h-10 rounded md:w-12 md:h-12 transition-slow">

                <span class="text-xl md:text-2xl font-medium logo-text transition-slow">USeP Library</span>
            </div>
            <button id="closeBtn" class="md:hidden text-white hover:text-usepgold text-2xl transition-slow">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <button id="toggleBtn" class="hidden md:block absolute -right-4 top-1/2 -translate-y-1/2 bg-usepmaroon text-usepgold border-2 border-usepgold w-8 h-8 rounded-full flex items-center justify-center transition-slow toggle-btn hover:bg-usepgold hover:text-usepmaroon">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
        </div>
        <nav class="flex-1 overflow-y-auto px-4 py-6 space-y-2 md:space-y-3 text-sm md:text-base">
            <p class="px-2 text-xs md:text-sm font-semibold uppercase text-usepgold tracking-wider mb-3 section-title">Book Circulation</p>
            <a href="#" id="borrowReturnNav" class="nav-item flex items-center gap-3 px-3 py-2.5 md:py-3 rounded-lg hover:bg-usepmaroon/90 transition-slow">
                <i class="fas fa-exchange-alt w-6 text-center text-white md:text-xl"></i>
                <span class="nav-text font-medium md:text-lg">Borrowing & Returning</span>
            </a>
            <hr class="border-usepgold/30 my-2" />
            <a href="#" id="clearanceNav" class="nav-item flex items-center gap-3 px-3 py-2.5 md:py-3 rounded-lg hover:bg-usepmaroon/90 transition-slow">
                <i class="fa-solid fa-file-circle-check w-6 text-center text-white md:text-xl"></i>
                <span class="nav-text font-medium md:text-lg">Clearance</span>
            </a>

            <!-- Reports Section -->
            <div class="relative has-submenu">
                <div class="submenu-parent nav-item flex items-center justify-between px-3 py-2.5 md:py-3 rounded-lg hover:bg-usepmaroon/90 transition-slow">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-chart-column w-6 text-center text-white md:text-xl"></i>
                        <span class="nav-text font-medium md:text-lg">Reports</span>
                    </div>
                    <div class="flex items-center">
                        <button class="chevron-btn text-xs ml-2">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </div>
                </div>
                <div class="submenu pl-4 space-y-1">
                    <a href="#" id="libraryBorrowedItemsNav" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow submenu-item">
                        <div class="flex items-center">
                            <i class="fa-solid fa-book text-usepgold text-xl mr-3"></i>
                            <div class="flex flex-col leading-tight">
                                <span class="nav-text text-sm font-medium">Library Items</span>
                                <span class="nav-text text-sm font-medium">Borrowed Items</span>
                            </div>
                        </div>
                    </a>

                    <a href="#" id="studentWithPenaltyNav" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow submenu-item">
                        <i class="fa-solid fa-exclamation-circle w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Students with Penalty</span>
                    </a>
                    <a href="#" id="transactionProfileNav" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow submenu-item">
                        <i class="fa-solid fa-receipt w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Transaction Profile</span>
                    </a>
                    <a href="#" id="missingCollectionNav" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow submenu-item">
                        <i class="fa-solid fa-book-skull w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Missing Collection</span>
                    </a>
                    <a href="#" id="coreCollectionNav" class="nav-item flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow submenu-item">
                        <i class="fa-solid fa-book-atlas w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Core Collection</span>
                    </a>
                    <a href="#" id="clearanceReportNav" class="nav-item flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow submenu-item">
                        <i class="fa-solid fa-file-certificate w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Clearance Report</span>
                    </a>
                    <a href="#" id="filipinianaNav" class="nav-item flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow submenu-item">
                        <i class="fa-solid fa-flag w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Filipiniana</span>
                    </a>
                </div>
            </div>

            <!-- Statistical Data Section -->
            <div class="relative has-submenu">
                <div class="submenu-parent nav-item flex items-center justify-between px-3 py-2.5 md:py-3 rounded-lg hover:bg-usepmaroon/90 transition-slow">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-chart-pie w-6 text-center text-white md:text-xl"></i>
                        <span class="nav-text font-medium md:text-lg">Statistical Data</span>
                    </div>
                    <div class="flex items-center">
                        <button class="chevron-btn text-xs ml-2">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </div>
                </div>
                <div class="submenu pl-4 space-y-1">
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow submenu-item">
                        <i class="fa-solid fa-chart-bar w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Comparative Report</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow submenu-item">
                        <i class="fa-solid fa-book-open-reader w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">General Book Loan</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow submenu-item">
                        <i class="fa-solid fa-user-graduate w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Graduate Book Loan</span>
                    </a>
                </div>
            </div>

            <!-- User Logs Section -->
            <div class="relative has-submenu">
                <div class="submenu-parent nav-item flex items-center justify-between px-3 py-2.5 md:py-3 rounded-lg hover:bg-usepmaroon/90 transition-slow">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-clipboard-list w-6 text-center text-white md:text-xl"></i>
                        <span class="nav-text font-medium md:text-lg">User Logs</span>
                    </div>
                    <div class="flex items-center">
                        <button class="chevron-btn text-xs ml-2">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </div>
                </div>
                <div class="submenu pl-4 space-y-1">
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow submenu-item">
                        <i class="fa-solid fa-file w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Reports</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow submenu-item">
                        <i class="fa-solid fa-user-tag w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Patron Information</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow submenu-item">
                        <i class="fa-solid fa-ban w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Violations</span>
                    </a>
                </div>
            </div>

            <!-- Inventory Section -->
            <a href="#" id="inventoryNav" class="nav-item flex items-center gap-3 px-3 py-2.5 md:py-3 rounded-lg hover:bg-usepmaroon/90 transition-slow">
                <i class="fa-solid fa-boxes-stacked w-6 text-center text-white md:text-xl"></i>
                <span class="nav-text font-medium md:text-lg">Inventory</span>
            </a>
        </nav>
        <div class="px-4 py-4 border-t border-usepgold/30 mt-auto">
            <a href="#" class="flex items-center gap-3 text-usepgold hover:bg-usepgold/10 px-3 py-2.5 md:py-3 rounded-lg transition-slow">
                <i class="fa-solid fa-right-from-bracket w-6 text-center md:text-xl"></i>
                <span class="nav-text font-medium md:text-lg">Logout</span>
            </a>
        </div>
    </aside>
    <!-- Overlay - Only shows on mobile -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40 md:hidden transition-slow"></div>
    <!-- Main Content Area -->
    <div id="main-content" class="flex-1 flex flex-col md:ml-64 transition-slow">
        <!-- Topbar -->
        <header class="sticky top-0 z-20 flex items-center justify-between bg-white border-b shadow px-6 h-[72px]">
            <div class="flex items-center gap-4">
                <button id="mobileMenuBtn" class="md:hidden text-usepmaroon hover:text-usepgold text-2xl transition-slow">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <div class="flex items-center gap-6">
                <button class="relative text-gray-600 hover:text-usepmaroon transition-slow">
                    <i class="fa-solid fa-bell text-xl"></i>
                    <span class="absolute -top-1 -right-2 bg-usepmaroon text-white text-xs w-5 h-5 rounded-full flex items-center justify-center font-bold">3</span>
                </button>
                <div class="relative">
                    <div id="profile-trigger" class="flex items-center gap-2 cursor-pointer">
                        <img src="https://via.placeholder.com/40/800000/ffffff?text=JD" alt="User" class="w-8 h-8 rounded-full border-2 border-white shadow"/>
                        <span class="hidden md:block font-medium text-usepmaroon">Jane Doe</span>
                        <i class="fa-solid fa-chevron-down text-xs ml-1 text-usepmaroon"></i>
                    </div>
                    <div id="profile-dropdown" class="profile-dropdown absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-usepgold/20 hover:text-usepmaroon transition-slow">
                            <i class="fa-solid fa-user-cog mr-2"></i> Account Settings
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-usepgold/20 hover:text-usepmaroon transition-slow">
                            <i class="fa-solid fa-clock-rotate-left mr-2"></i> History
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content Container -->
        <main class="flex-1 p-6 bg-gradient-to-br from-gray-50 to-gray-100">
            <div id="content-container" class="h-full bg-white border border-gray-200 rounded-lg shadow-sm p-8 space-y-6">
                <!-- Content will be loaded here -->
            </div>
        </main>
        <footer class="bg-usepmaroon text-white py-2">
            <div class="container mx-auto px-2">
                <div class="flex flex-col items-center justify-center text-center space-y-2">
                    <h3 class="text-2xl font-bold tracking-wide">USEP Library</h3>
                    <p class="text-usepgold/90 text-lg">Tagum-Mabini Campus</p>
                </div>
            </div>
        </footer>
    </div>
</div>
<script>
    // Sidebar and overlay controls
    import axios from "axios";

    const sidebar = document.getElementById('sidebar');
    const openBtn = document.getElementById('mobileMenuBtn');
    const closeBtn = document.getElementById('closeBtn');
    const overlay = document.getElementById('overlay');
    const toggleBtn = document.getElementById('toggleBtn');
    const contentContainer = document.getElementById('content-container');

    // Profile dropdown controls
    const profileTrigger = document.getElementById('profile-trigger');
    const profileDropdown = document.getElementById('profile-dropdown');

    // Navigation elements
    const borrowReturnNav = document.getElementById('borrowReturnNav');
    const clearanceNav = document.getElementById('clearanceNav');
    const inventoryNav = document.getElementById('inventoryNav');
    const libraryBorrowedItemsNav = document.getElementById('libraryBorrowedItemsNav');
    const studentWithPenaltyNav = document.getElementById('studentWithPenaltyNav');
    const transactionProfileNav = document.getElementById('transactionProfileNav');
    const missingCollectionNav = document.getElementById('missingCollectionNav');

    // Sidebar toggle
    function toggleSidebar() {
        sidebar.classList.toggle('sidebar-collapsed');
        toggleBtn.innerHTML = sidebar.classList.contains('sidebar-collapsed')
            ? '<i class="fa-solid fa-chevron-right"></i>'
            : '<i class="fa-solid fa-chevron-left"></i>';
    }

    function openSidebar() {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.style.overflow = '';
    }

    openBtn.addEventListener('click', openSidebar);
    closeBtn.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);
    toggleBtn.addEventListener('click', toggleSidebar);

    // Profile dropdown
    profileTrigger.addEventListener('click', function(e) {
        e.stopPropagation();
        profileDropdown.classList.toggle('show');
    });

    document.addEventListener('click', function(e) {
        if (!profileTrigger.contains(e.target) && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.remove('show');
        }
    });

    // Improved submenu functionality
    document.querySelectorAll('.has-submenu').forEach(menu => {
        const parent = menu.querySelector('.submenu-parent');
        const chevron = parent.querySelector('.chevron-btn');
        const submenu = menu.querySelector('.submenu');

        // Toggle submenu when clicking anywhere on the parent (including chevron)
        parent.addEventListener('click', function(e) {
            // Only toggle if not clicking on a link inside the submenu
            if (!e.target.closest('.submenu a')) {
                submenu.classList.toggle('open');
                updateChevronIcon(submenu, chevron);
            }
        });

        // Prevent submenu from closing when clicking inside it
        submenu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    });

    function updateChevronIcon(submenu, chevron) {
        if (!chevron) return;

        const icon = chevron.querySelector('i');
        if (submenu.classList.contains('open')) {
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-up');
        } else {
            icon.classList.remove('fa-chevron-up');
            icon.classList.add('fa-chevron-down');
        }
    }

    // Close submenus when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.has-submenu')) {
            document.querySelectorAll('.submenu').forEach(submenu => {
                submenu.classList.remove('open');
                const parent = submenu.closest('.has-submenu');
                if (parent) {
                    const chevron = parent.querySelector('.chevron-btn');
                    if (chevron) {
                        const icon = chevron.querySelector('i');
                        icon.classList.remove('fa-chevron-up');
                        icon.classList.add('fa-chevron-down');
                    }
                }
            });
        }
    });

    // Navigation functions
    function loadBorrowAndReturn() {
        axios.get('/staff/borrow-return')
            .then(response => {
                contentContainer.innerHTML = response.data;
                initAddTabs(contentContainer);
            })
            .catch(error => {
                console.error('Error:', error);
                contentContainer.innerHTML = '<p class="text-red-500">Error loading content. Please try again.</p>';
            });
    }

    function loadClearance() {
        axios.get(route('staff.clearance'))
            .then(response => {
                contentContainer.innerHTML = response.data;
            })
            .catch(handleError);
    }

    function loadInventory() {
        axios.get(route('staff.inventory'))
            .then(response => {
                contentContainer.innerHTML = response.data;
            })
            .catch(handleError);
    }

    function handleError(error) {
        console.error('Error:', error);
        contentContainer.innerHTML = `


        <div class="p-4 bg-red-50 border border-red-200 rounded-lg">
            <p class="text-red-500">Error loading content. Please try again.</p>
            ${error.response?.data?.message || ''}
        </div>
    `;
    }

    function loadLibraryAndBorrowedItems() {
        fetch('libraryAndBorrowedItems.html')
            .then(response => response.text())
            .then(html => {
                contentContainer.innerHTML = html;
                // Execute script and initialize tabs if present
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;
                const script = tempDiv.querySelector('script');
                if (script) {
                    eval(script.textContent);
                    if (typeof initAddTabs === 'function') {
                        initAddTabs(contentContainer);
                    }
                }
                // Set active nav
                document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
                libraryBorrowedItemsNav.classList.add('active');
            })
            .catch(error => {
                console.error('Error loading libraryAndBorrowedItems.html:', error);
                contentContainer.innerHTML = '<p class="text-red-500">Error loading content. Please try again.</p>';
            });
    }

    // Event listeners for navigation
    borrowReturnNav.addEventListener('click', function(e) {
        e.preventDefault();
        loadBorrowAndReturn();
    });

    clearanceNav.addEventListener('click', function(e) {
        e.preventDefault();
        loadClearance();
    });

    inventoryNav.addEventListener('click', function(e) {
        e.preventDefault();
        loadInventory();
    });

    libraryBorrowedItemsNav.addEventListener('click', function(e) {
        e.preventDefault();
        loadLibraryAndBorrowedItems();
    });

    studentWithPenaltyNav.addEventListener('click', function(e) {
        e.preventDefault();
        studentWithPenalty();
    });

    transactionProfileNav.addEventListener('click', function(e) {
        e.preventDefault();
        transactionProfile();
    });

    missingCollectionNav.addEventListener('click', function(e) {
        e.preventDefault();
        missingCollection();
    });

    // Load default content on page load
    loadBorrowAndReturn();

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        } else if (!sidebar.classList.contains('-translate-x-full') && !sidebar.classList.contains('sidebar-collapsed')) {
            sidebar.classList.add('-translate-x-full');
        }
    });

    function studentWithPenalty() {
        fetch('studentsWithPenalty.html')
            .then(response => response.text())
            .then(html => {
                contentContainer.innerHTML = html;
                // Execute script and initialize tabs if present
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;
                const script = tempDiv.querySelector('script');
                if (script) {
                    eval(script.textContent);
                    if (typeof initAddTabs === 'function') {
                        initAddTabs(contentContainer);
                    }
                }
                // Set active nav
                document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
                studentWithPenaltyNav.classList.add('active');
            })
            .catch(error => {
                console.error('Error loading studentWithPenalty.html:', error);
                contentContainer.innerHTML = '<p class="text-red-500">Error loading content. Please try again.</p>';
            });
    }

    function transactionProfile() {
        fetch('transactionProfile.html')
            .then(response => response.text())
            .then(html => {
                contentContainer.innerHTML = html;
                // Execute script and initialize tabs if present
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;
                const script = tempDiv.querySelector('script');
                if (script) {
                    eval(script.textContent);
                    if (typeof initAddTabs === 'function') {
                        initAddTabs(contentContainer);
                    }
                }
                // Set active nav
                document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
                transactionProfileNav.classList.add('active');
            })
            .catch(error => {
                console.error('Error loading transactionProfile.html:', error);
                contentContainer.innerHTML = '<p class="text-red-500">Error loading content. Please try again.</p>';
            });
    }

    function missingCollection() {
        fetch('missingCollection.html')
            .then(response => response.text())
            .then(html => {
                contentContainer.innerHTML = html;
                // Execute script and initialize tabs if present
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;
                const script = tempDiv.querySelector('script');
                if (script) {
                    eval(script.textContent);
                    if (typeof initAddTabs === 'function') {
                        initAddTabs(contentContainer);
                    }
                }
                // Set active nav
                document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
                missingCollectionNav.classList.add('active');
            })
            .catch(error => {
                console.error('Error loading missingCollection.html:', error);
                contentContainer.innerHTML = '<p class="text-red-500">Error loading content. Please try again.</p>';
            });
    }
</script>
</body>
</html>
