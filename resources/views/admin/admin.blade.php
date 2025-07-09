<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>USEP Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
        .submenu.open { max-height: 200px; }
        .nav-item:hover { background-color: rgba(255, 215, 0, 0.2) !important; border-left: 3px solid #FFD700; }
        .submenu a { display: block; }
        .submenu a:hover { background-color: rgba(255, 215, 0, 0.2) !important; }
        .profile-dropdown { display: none; opacity: 0; transform: translateY(-10px); transition: opacity 0.2s ease, transform 0.2s ease; }
        .profile-dropdown.show { display: block; opacity: 1; transform: translateY(0); }
        .chart-container { position: relative; height: 300px; }
        .chevron-btn { pointer-events: auto; }
        .chevron-btn:hover { color: #FFD700; }
    </style>
    @livewireStyles
</head>
<body class="bg-gray-50 font-sans antialiased">
<div class="flex min-h-screen relative">
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-usepmaroon text-white shadow-lg transform -translate-x-full md:translate-x-0 transition-slow flex flex-col z-50">
        <div class="flex items-center justify-between px-6 border-b border-usepgold/50 h-[72px] relative">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/usep-logo-small.png') }}"  alt="Logo" class="w-10 h-10 rounded md:w-12 md:h-12 transition-slow">
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
            <p class="px-2 text-xs md:text-sm font-semibold uppercase text-usepgold tracking-wider mb-3 section-title">Home</p>
            <a href="{{ route('admin.dashboard') }}" id="dashboardBtn" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 md:py-3 rounded-lg hover:bg-usepmaroon/90 transition-slow">
                <i class="fa-solid fa-gauge-high w-6 text-center text-usepgold md:text-xl"></i>
                <span class="nav-text font-medium md:text-lg">Dashboard</span>
            </a>
            <!-- Add with dropdown  -->
            <div class="relative has-submenu">
                <a href="{{ route('admin.add') }}" id="addMenuBtn" class="nav-item {{ request()->routeIs('admin.add.*') ? 'active' : '' }} flex items-center justify-between px-3 py-2.5 md:py-3 rounded-lg hover:bg-usepmaroon/90 transition-slow">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-square-plus w-6 text-center text-white md:text-xl"></i>
                        <span class="nav-text font-medium md:text-lg">Add</span>
                    </div>
                    <div class="flex items-center">
                        <button class="chevron-btn text-xs ml-2">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </div>
                </a>
                <div class="submenu pl-4 space-y-1">
                    <a href="{{ route('admin.add.user') }}" class="add-submenu-item flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow" data-page="user">
                        <i class="fa-solid fa-user-plus w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">User</span>
                    </a>
                    <a href="{{ route('admin.add.school') }}" class="add-submenu-item flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow" data-page="school">
                        <i class="fa-solid fa-school w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">School Information</span>
                    </a>
                </div>
            </div>
            <!-- Update with dropdown -->
            <div class="relative has-submenu">
                <a href="#" id="updateMenuBtn" class="nav-item {{ request()->routeIs('admin.update.*') ? 'active' : '' }} flex items-center justify-between px-3 py-2.5 md:py-3 rounded-lg hover:bg-usepmaroon/90 transition-slow">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-pen-to-square w-6 text-center text-white md:text-xl"></i>
                        <span class="nav-text font-medium md:text-lg">Update </span>
                    </div>
                    <div class="flex items-center">
                        <button class="chevron-btn text-xs ml-2">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </div>
                </a>
                <div class="submenu pl-4 space-y-1">
                    <a href="{{ route('admin.update.user') }}" class="update-submenu-item flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow" data-page="updateUser">
                        <i class="fa-solid fa-user-pen w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Update User</span>
                    </a>
                    <a href="{{ route('admin.update.school-info') }}" class="update-submenu-item flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow" data-page="updateSchoolInfo">
                        <i class="fa-solid fa-school-flag w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Update School Info</span>
                    </a>
                </div>
            </div>
            <!-- Accounts with dropdown -->
            <div class="relative has-submenu">
                <a href="#" id="accountsMenuBtn" class="nav-item {{ request()->routeIs('admin.accounts.*') ? 'active' : '' }} flex items-center justify-between px-3 py-2.5 md:py-3 rounded-lg hover:bg-usepmaroon/90 transition-slow">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-user-gear w-6 text-center text-white md:text-xl"></i>
                        <span class="nav-text font-medium md:text-lg">Accounts</span>
                    </div>
                    <div class="flex items-center">
                        <button class="chevron-btn text-xs ml-2">
                            <i class="fa-solid fa-chevron-down"></i>
                        </button>
                    </div>
                </a>
                <div class="submenu pl-4 space-y-1">
                    <a href="{{ route('admin.accounts.manage') }}" class="accounts-submenu-item flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-usepmaroon/80 transition-slow" data-page="manageAccounts">
                        <i class="fa-solid fa-users-gear w-5 text-center text-usepgold"></i>
                        <span class="nav-text text-sm font-medium">Manage Accounts</span>
                    </a>
                </div>
            </div>
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

                        <img src="{{ asset('images/admin-logo.png') }}" alt="User" class="w-8 h-8 rounded-full border-2 border-white shadow"/>
                        <span class="hidden md:block font-medium text-usepmaroon">Doms R</span>
                        <i class="fa-solid fa-chevron-down text-xs ml-1 text-usepmaroon"></i>
                    </div>
                    <div id="profile-dropdown" class="profile-dropdown absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        <a href="{{ route('admin.account-settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-usepgold/20 hover:text-usepmaroon transition-slow">
                            <i class="fa-solid fa-user-cog mr-2"></i> Account Settings
                        </a>
                        <a href="{{ route('admin.history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-usepgold/20 hover:text-usepmaroon transition-slow">
                            <i class="fa-solid fa-clock-rotate-left mr-2"></i> Admin History
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content Container -->
        <main class="flex-1 p-6 bg-gradient-to-br from-gray-50 to-gray-100">
            @if(request()->routeIs('admin.dashboard'))
                @include('livewire.admin.dashboard')
            @else
                @yield('content')
            @endif
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

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sidebar and overlay controls
    const sidebar = document.getElementById('sidebar');
    const openBtn = document.getElementById('mobileMenuBtn');
    const closeBtn = document.getElementById('closeBtn');
    const overlay = document.getElementById('overlay');
    const toggleBtn = document.getElementById('toggleBtn');
    const contentContainer = document.getElementById('content-container');
    const dashboardContent = document.getElementById('dashboard-content');

    // Profile dropdown controls
    const profileTrigger = document.getElementById('profile-trigger');
    const profileDropdown = document.getElementById('profile-dropdown');

    // Chart variables
    let borrowingChart;
    let currentView = 'monthly'; // 'monthly' or 'yearly'

    // Track active menu states
    let activeMainMenu = 'dashboard';
    let activeSubMenu = null;

    // Initialize the page
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Chart
        initChart();

        // Set current month as selected
        const currentMonth = new Date().getMonth() + 1;
        document.getElementById('month-selector').value = currentMonth;

        // Set current year as selected
        const currentYear = new Date().getFullYear();
        const yearSelector = document.getElementById('year-selector');
        if (!Array.from(yearSelector.options).some(option => option.value == currentYear)) {
            const option = document.createElement('option');
            option.value = currentYear;
            option.text = currentYear;
            yearSelector.insertBefore(option, yearSelector.firstChild);
        }
        yearSelector.value = currentYear;

        // Update chart when year changes
        yearSelector.addEventListener('change', updateChartData);

        // Update chart when month changes
        document.getElementById('month-selector').addEventListener('change', updateChartData);

        // Toggle between monthly and yearly views
        document.getElementById('monthly-btn').addEventListener('click', function() {
            if (currentView !== 'monthly') {
                currentView = 'monthly';
                this.classList.add('bg-usepmaroon', 'text-white');
                this.classList.remove('bg-gray-100', 'text-gray-600');
                document.getElementById('yearly-btn').classList.add('bg-gray-100', 'text-gray-600');
                document.getElementById('yearly-btn').classList.remove('bg-usepmaroon', 'text-white');
                updateChartData();
            }
        });

        document.getElementById('yearly-btn').addEventListener('click', function() {
            if (currentView !== 'yearly') {
                currentView = 'yearly';
                this.classList.add('bg-usepmaroon', 'text-white');
                this.classList.remove('bg-gray-100', 'text-gray-600');
                document.getElementById('monthly-btn').classList.add('bg-gray-100', 'text-gray-600');
                document.getElementById('monthly-btn').classList.remove('bg-usepmaroon', 'text-white');
                updateChartData();
            }
        });

        // Add event listeners for chevron buttons to toggle submenus
        document.querySelectorAll('.chevron-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const parentMenu = this.closest('.has-submenu');
                const submenu = parentMenu.querySelector('.submenu');

                // Close all other submenus if this is a main menu
                if (parentMenu.id === 'addMenuBtn' || parentMenu.id === 'updateMenuBtn' || parentMenu.id === 'accountsMenuBtn') {
                    document.querySelectorAll('.submenu').forEach(sm => {
                        if (sm !== submenu) {
                            sm.classList.remove('open');
                            const icon = sm.closest('.has-submenu').querySelector('.chevron-btn i');
                            if (icon) {
                                icon.classList.remove('fa-chevron-up');
                                icon.classList.add('fa-chevron-down');
                            }
                        }
                    });
                }

                submenu.classList.toggle('open');

                // Rotate chevron icon
                const icon = this.querySelector('i');
                if (submenu.classList.contains('open')) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            });
        });

        // Close submenus when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.has-submenu')) {
                document.querySelectorAll('.submenu').forEach(submenu => {
                    // Don't close if it's the active submenu
                    if (!submenu.closest('.has-submenu').classList.contains(activeMainMenu + '-menu')) {
                        submenu.classList.remove('open');
                        const icon = submenu.closest('.has-submenu').querySelector('.chevron-btn i');
                        if (icon) {
                            icon.classList.remove('fa-chevron-up');
                            icon.classList.add('fa-chevron-down');
                        }
                    }
                });
            }
        });
    });

    // Initialize Chart.js
    function initChart() {
        const ctx = document.getElementById('borrowingChart').getContext('2d');
        borrowingChart = new Chart(ctx, {
            type: 'line',
            data: getChartData(),
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    }

    // Get chart data based on current view
    function getChartData() {
        const year = document.getElementById('year-selector').value;
        const month = document.getElementById('month-selector').value;

        if (currentView === 'monthly') {
            return {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Borrowed Books',
                    data: [45, 60, 75, 55],
                    borderColor: '#800000',
                    backgroundColor: 'rgba(128, 0, 0, 0.1)',
                    tension: 0.3,
                    fill: true
                }, {
                    label: 'Returned Books',
                    data: [35, 50, 65, 45],
                    borderColor: '#FFD700',
                    backgroundColor: 'rgba(255, 215, 0, 0.1)',
                    tension: 0.3,
                    fill: true
                }]
            };
        } else {
            // Yearly view
            return {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Borrowed Books',
                    data: [320, 290, 350, 380, 400, 420, 450, 470, 410, 390, 360, 330],
                    borderColor: '#800000',
                    backgroundColor: 'rgba(128, 0, 0, 0.1)',
                    tension: 0.3,
                    fill: true
                }, {
                    label: 'Returned Books',
                    data: [300, 270, 330, 360, 380, 400, 430, 450, 390, 370, 340, 310],
                    borderColor: '#FFD700',
                    backgroundColor: 'rgba(255, 215, 0, 0.1)',
                    tension: 0.3,
                    fill: true
                }]
            };
        }
    }

    // Update chart data
    function updateChartData() {
        const newData = getChartData();
        borrowingChart.data.labels = newData.labels;
        borrowingChart.data.datasets[0].data = newData.datasets[0].data;
        borrowingChart.data.datasets[1].data = newData.datasets[1].data;
        borrowingChart.update();
    }

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

    // Navigation functions
    document.getElementById('dashboardBtn').addEventListener('click', function(e) {
        e.preventDefault();
        activeMainMenu = 'dashboard';
        activeSubMenu = null;
        showDashboard();
        // Close all submenus when going to dashboard
        document.querySelectorAll('.submenu').forEach(submenu => {
            submenu.classList.remove('open');
            const icon = submenu.closest('.has-submenu').querySelector('.chevron-btn i');
            if (icon) {
                icon.classList.remove('fa-chevron-up');
                icon.classList.add('fa-chevron-down');
            }
        });
    });

    document.getElementById('addMenuBtn').addEventListener('click', function(e) {
        e.preventDefault();
        activeMainMenu = 'add';
        activeSubMenu = null;
        loadAddContent();
        // Open the add submenu and close others
        toggleSubmenu('addMenuBtn', true);
    });

    document.querySelectorAll('.add-submenu-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            activeMainMenu = 'add';
            activeSubMenu = this.getAttribute('data-page');
            const page = this.getAttribute('data-page');
            if (page === 'user') {
                fetch('{{ route('admin.add.user') }}')
                    .then(response => response.text())
                    .then(html => {
                        contentContainer.innerHTML = html;
                        updateActiveMenu('addMenuBtn');
                        // Keep add submenu open
                        toggleSubmenu('addMenuBtn', true);
                    });
            } else if (page === 'school') {
                fetch('{{ route('admin.add.school') }}')
                    .then(response => response.text())
                    .then(html => {
                        contentContainer.innerHTML = html;
                        updateActiveMenu('addMenuBtn');
                        // Keep add submenu open
                        toggleSubmenu('addMenuBtn', true);
                    });
            } else {
                loadAddContent(page);
                // Keep add submenu open
                toggleSubmenu('addMenuBtn', true);
            }
        });
    });

    document.getElementById('updateMenuBtn').addEventListener('click', function(e) {
        e.preventDefault();
        activeMainMenu = 'update';
        activeSubMenu = null;
        loadUpdateContent();
        // Open the update submenu and close others
        toggleSubmenu('updateMenuBtn', true);
    });

    document.querySelectorAll('.update-submenu-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            activeMainMenu = 'update';
            activeSubMenu = this.getAttribute('data-page');
            const page = this.getAttribute('data-page');
            if (page === 'updateUser') {
                fetch('{{ route('admin.update.user') }}')
                    .then(response => response.text())
                    .then(html => {
                        contentContainer.innerHTML = html;
                        updateActiveMenu('updateMenuBtn');
                        // Keep update submenu open
                        toggleSubmenu('updateMenuBtn', true);
                    });
            } else if (page === 'updateSchoolInfo') {
                fetch('updateSchoolInfrmation.html')
                    .then(response => response.text())
                    .then(html => {
                        contentContainer.innerHTML = html;

                        const tempDiv = document.createElement('div');
                        tempDiv.innerHTML = html;
                        const script = tempDiv.querySelector('script');
                        if (script) {
                            eval(script.textContent);
                        }

                        if (typeof initAddTabs === 'function') {
                            initAddTabs(contentContainer);
                        }

                        updateActiveMenu('updateMenuBtn');
                        // Keep update submenu open
                        toggleSubmenu('updateMenuBtn', true);
                    });
            } else {
                loadUpdateContent(page);
                // Keep update submenu open
                toggleSubmenu('updateMenuBtn', true);
            }
        });
    });

    document.getElementById('accountsMenuBtn').addEventListener('click', function(e) {
        e.preventDefault();
        activeMainMenu = 'accounts';
        activeSubMenu = null;
        loadAccountsContent();
        // Open the accounts submenu and close others
        toggleSubmenu('accountsMenuBtn', true);
    });

    document.querySelectorAll('.accounts-submenu-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            activeMainMenu = 'accounts';
            activeSubMenu = this.getAttribute('data-page');
            const page = this.getAttribute('data-page');
            if (page === 'manageAccounts') {
                fetch('{{ route('admin.accounts.manage') }}')
                    .then(response => response.text())
                    .then(html => {
                        contentContainer.innerHTML = html;
                        updateActiveMenu('accountsMenuBtn');
                        // Keep accounts submenu open
                        toggleSubmenu('accountsMenuBtn', true);
                    });
            } else if (page === 'addAccounts') {
                loadAccountsContent();
                // Keep accounts submenu open
                toggleSubmenu('accountsMenuBtn', true);
            }
        });
    });

    //Yawa ang Error di masulbad
    function loadAccountSettings() {
        fetch('accountSettingAdmin.html')
            .then(response => response.text())
            .then(html => {
                contentContainer.innerHTML = html;
                updateActiveMenu();
                profileDropdown.classList.remove('show');
            });
    }

    function loadHistory() {
        fetch('history.html')
            .then(response => response.text())
            .then(html => {
                contentContainer.innerHTML = html;
                updateActiveMenu();
                profileDropdown.classList.remove('show');
            });
    }

    function loadAddContent(page) {
        fetch('{{ route('admin.add') }}')
            .then(response => response.text())
            .then(html => {
                contentContainer.innerHTML = html;

                // Find and execute the script in add.html
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;
                const script = tempDiv.querySelector('script');
                if (script) {
                    eval(script.textContent);
                    if (typeof initAddTabs === 'function') {
                        initAddTabs(contentContainer);
                    }
                }

                updateActiveMenu('addMenuBtn');
                // Keep add submenu open
                toggleSubmenu('addMenuBtn', true);
            });
    }

    function loadUpdateContent(page) {
        fetch('{{ route('admin.update') }}')
            .then(response => response.text())
            .then(html => {
                contentContainer.innerHTML = html;

                // Find and execute the script in add.html
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = html;
                const script = tempDiv.querySelector('script');
                if (script) {
                    eval(script.textContent);
                    if (typeof initAddTabs === 'function') {
                        initAddTabs(contentContainer);
                    }
                }

                updateActiveMenu('updateMenuBtn');
                // Keep update submenu open
                toggleSubmenu('updateMenuBtn', true);
            });
    }

    function loadAccountsContent() {
        fetch('{{ route('admin.accounts') }}')
            .then(response => response.text())
            .then(html => {
                contentContainer.innerHTML = html;
                updateActiveMenu('accountsMenuBtn');
                // Keep accounts submenu open
                toggleSubmenu('accountsMenuBtn', true);
            });
    }

    function showDashboard() {
        contentContainer.innerHTML = dashboardContent.innerHTML;
        updateActiveMenu('dashboardBtn');
        // Reinitialize chart when showing dashboard
        initChart();
    }

    // Helper function to update active menu state
    function updateActiveMenu(activeId) {
        document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
        if (activeId) {
            document.getElementById(activeId).classList.add('active');
        }
    }

    // Helper function to toggle submenu state
    function toggleSubmenu(menuId, forceOpen = false) {
        const menu = document.getElementById(menuId);
        if (!menu) return;

        const submenu = menu.closest('.has-submenu').querySelector('.submenu');
        const icon = menu.closest('.has-submenu').querySelector('.chevron-btn i');

        if (forceOpen) {
            // Close all other submenus first
            document.querySelectorAll('.submenu').forEach(sm => {
                if (sm !== submenu) {
                    sm.classList.remove('open');
                    const otherIcon = sm.closest('.has-submenu').querySelector('.chevron-btn i');
                    if (otherIcon) {
                        otherIcon.classList.remove('fa-chevron-up');
                        otherIcon.classList.add('fa-chevron-down');
                    }
                }
            });

            // Open the requested submenu
            submenu.classList.add('open');
            if (icon) {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            }
        } else {
            // Toggle the submenu
            submenu.classList.toggle('open');
            if (icon) {
                if (submenu.classList.contains('open')) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            }
        }
    }

    // Event listeners
    openBtn.addEventListener('click', openSidebar);
    closeBtn.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);
    toggleBtn.addEventListener('click', toggleSidebar);

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
</script>
@livewireScripts
</body>
</html>
