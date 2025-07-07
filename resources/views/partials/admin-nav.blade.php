<nav class="bg-usepmaroon text-white">
    <ul class="space-y-2 p-4">
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="block px-4 py-2 rounded hover:bg-usepgold hover:text-usepmaroon {{ request()->routeIs('admin.dashboard') ? 'bg-usepgold text-usepmaroon' : '' }}">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.add') }}"
               class="block px-4 py-2 rounded hover:bg-usepgold hover:text-usepmaroon {{ request()->routeIs('admin.add') ? 'bg-usepgold text-usepmaroon' : '' }}">
                <i class="fas fa-plus mr-2"></i> Add
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users') }}"
               class="block px-4 py-2 rounded hover:bg-usepgold hover:text-usepmaroon {{ request()->routeIs('admin.users') ? 'bg-usepgold text-usepmaroon' : '' }}">
                <i class="fas fa-users mr-2"></i> Users
            </a>
        </li>
        <!-- Add other menu items following the same pattern -->
    </ul>
</nav>
