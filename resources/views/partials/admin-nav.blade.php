<nav class="bg-usepmaroon text-white">
    <ul class="space-y-2 p-4">
        <!-- Dashboard -->
        <li>
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center px-4 py-2 rounded transition-colors hover:bg-usepgold hover:text-usepmaroon {{ request()->routeIs('admin.dashboard') ? 'bg-usepgold text-usepmaroon' : '' }}">
                <i class="fas fa-tachometer-alt w-5 text-center mr-3"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Add -->
        <li>
            <a href="{{ route('admin.add') }}"
               class="flex items-center px-4 py-2 rounded transition-colors hover:bg-usepgold hover:text-usepmaroon {{ request()->routeIs('admin.add') ? 'bg-usepgold text-usepmaroon' : '' }}">
                <i class="fas fa-plus-circle w-5 text-center mr-3"></i>
                <span>Add Items</span>
            </a>
        </li>

        <!-- Users -->
        <li>
            <a href="{{ route('admin.users') }}"
               class="flex items-center px-4 py-2 rounded transition-colors hover:bg-usepgold hover:text-usepmaroon {{ request()->routeIs('admin.users') ? 'bg-usepgold text-usepmaroon' : '' }}">
                <i class="fas fa-users w-5 text-center mr-3"></i>
                <span>User Management</span>
            </a>
        </li>

        <!-- School Information -->
        <li>
            <a href="{{ route('admin.school') }}"
               class="flex items-center px-4 py-2 rounded transition-colors hover:bg-usepgold hover:text-usepmaroon {{ request()->routeIs('admin.school') ? 'bg-usepgold text-usepmaroon' : '' }}">
                <i class="fas fa-school w-5 text-center mr-3"></i>
                <span>School Information</span>
            </a>
        </li>

        <!-- Update -->
        <li>
            <a href="{{ route('admin.update-school') }}"
               class="flex items-center px-4 py-2 rounded transition-colors hover:bg-usepgold hover:text-usepmaroon {{ request()->routeIs('admin.update-school') ? 'bg-usepgold text-usepmaroon' : '' }}">
                <i class="fas fa-sync-alt w-5 text-center mr-3"></i>
                <span>Update Information</span>
            </a>
        </li>

        <!-- Accounts -->
        <li>
            <a href="{{ route('admin.accounts') }}"
               class="flex items-center px-4 py-2 rounded transition-colors hover:bg-usepgold hover:text-usepmaroon {{ request()->routeIs('admin.accounts') ? 'bg-usepgold text-usepmaroon' : '' }}">
                <i class="fas fa-user-cog w-5 text-center mr-3"></i>
                <span>Account Settings</span>
            </a>
        </li>

        <!-- Account Settings -->
        <li>
            <a href="{{ route('admin.account-settings') }}"
               class="flex items-center px-4 py-2 rounded transition-colors hover:bg-usepgold hover:text-usepmaroon {{ request()->routeIs('admin.account-settings') ? 'bg-usepgold text-usepmaroon' : '' }}">
                <i class="fas fa-cog w-5 text-center mr-3"></i>
                <span>Advanced Settings</span>
            </a>
        </li>

        <!-- Manage Accounts -->
        <li>
            <a href="{{ route('admin.manage-accounts') }}"
               class="flex items-center px-4 py-2 rounded transition-colors hover:bg-usepgold hover:text-usepmaroon {{ request()->routeIs('admin.manage-accounts') ? 'bg-usepgold text-usepmaroon' : '' }}">
                <i class="fas fa-user-shield w-5 text-center mr-3"></i>
                <span>Manage Accounts</span>
            </a>
        </li>

        <!-- History -->
        <li>
            <a href="{{ route('admin.history') }}"
               class="flex items-center px-4 py-2 rounded transition-colors hover:bg-usepgold hover
               hover:text-usepmaroon {{ request()->routeIs('admin.history') ? 'bg-usepgold text-usepmaroon' : '' }}">
                <i class="fas fa-history w-5 text-center mr-3"></i>
                <span>History Log</span>
            </a>
        </li>

        <!-- Logout -->
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="flex items-center w-full px-4 py-2 rounded transition-colors hover:bg-usepgold hover:text-usepmaroon">
                    <i class="fas fa-sign-out-alt w-5 text-center mr-3"></i>
                    <span>Logout</span>
                </button>
            </form>
        </li>
    </ul>
</nav>
