
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-usepmaroon { background-color: #800000; }
        .text-usepmaroon { color: #800000; }
        .bg-usepgold { background-color: #FFD700; }
        .text-usepgold { color: #FFD700; }
        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            width: 90%;
            max-width: 500px;
            position: relative;
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);
        }
        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1.5rem;
            color: #888;
            cursor: pointer;
        }
        .close-modal:hover { color: #800000; }
    </style>
</head>
<body class="bg-gray-50">
<div class="p-8 max-w-5xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-usepmaroon">Account Management</h1>
        <div class="relative">
            <button id="filterButton" class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                <i class="fas fa-filter mr-2 text-usepmaroon"></i>
                Filter by Role
                <i class="fas fa-chevron-down ml-2 text-xs"></i>
            </button>
            <div id="filterDropdown" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg z-10 border border-gray-200">
                <div class="py-1">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 filter-option" data-role="all">All Users</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 filter-option" data-role="Admin">Admins</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 filter-option" data-role="Staff">Staff</a>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-usepmaroon text-white">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Position</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Role</th>
                <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider">Actions</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="userTableBody">
            <tr class="user-row" data-role="Staff">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Lindsay Walton</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Front-end Developer</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">lindsay.walton@example.com</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 role-display">Staff</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button onclick="openEditModal('1', 'Lindsay Walton', 'Staff')" class="text-usepmaroon hover:text-usepgold mr-2">
                        <i class="fas fa-edit"></i> Edit Role
                    </button>
                </td>
            </tr>
            <tr class="user-row" data-role="Admin">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">John Smith</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">System Administrator</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">john.smith@example.com</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 role-display">Admin</span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <button onclick="openEditModal('2', 'John Smith', 'Admin')" class="text-usepmaroon hover:text-usepgold mr-2">
                        <i class="fas fa-edit"></i> Edit Role
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closeEditModal()">&times;</span>
        <h2 class="text-xl font-bold text-usepmaroon mb-4">Edit User Role</h2>
        <div class="mb-4">
            <p class="text-gray-600 mb-2">Editing role for: <span id="editUserName" class="font-semibold text-gray-900"></span></p>
            <p class="text-gray-600">Current role: <span id="currentRole" class="font-semibold text-gray-900"></span></p>
        </div>
        <form id="editRoleForm" class="space-y-4">
            <input type="hidden" id="userId">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Select New Role</label>
                <div class="mt-1 space-y-2">
                    <div class="flex items-center">
                        <input id="role-admin" name="userRole" type="radio" value="Admin" class="h-4 w-4 text-usepmaroon focus:ring-usepmaroon border-gray-300">
                        <label for="role-admin" class="ml-2 block text-sm text-gray-700">Admin</label>
                    </div>
                    <div class="flex items-center">
                        <input id="role-staff" name="userRole" type="radio" value="Staff" class="h-4 w-4 text-usepmaroon focus:ring-usepmaroon border-gray-300">
                        <label for="role-staff" class="ml-2 block text-sm text-gray-700">Staff</label>
                    </div>
                </div>
            </div>
            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Cancel</button>
                <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-usepmaroon hover:bg-usepmaroon/90">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(userId, userName, currentRole) {
        document.getElementById("editUserName").textContent = userName;
        document.getElementById("currentRole").textContent = currentRole;
        document.getElementById("userId").value = userId;
        document.querySelector(`input[name="userRole"][value="${currentRole}"]`).checked = true;
        document.getElementById("editModal").style.display = "flex";
        document.body.style.overflow = "hidden";
    }

    function closeEditModal() {
        document.getElementById("editModal").style.display = "none";
        document.body.style.overflow = "";
    }

    document.getElementById("editRoleForm").addEventListener("submit", function(e) {
        e.preventDefault();
        const userId = document.getElementById("userId").value;
        const newRole = document.querySelector('input[name="userRole"]:checked').value;
        const row = document.querySelector(`button[onclick*="'${userId}'"]`).closest("tr");
        const roleDisplay = row.querySelector(".role-display");
        roleDisplay.textContent = newRole;
        roleDisplay.className = `px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${newRole === "Admin" ? "bg-red-100 text-red-800" : "bg-blue-100 text-blue-800"} role-display`;
        row.setAttribute("data-role", newRole);
        const editButton = row.querySelector("button");
        const onclickAttr = editButton.getAttribute("onclick");
        const updatedAttr = onclickAttr.replace(/'Admin'|'Staff'/, `'${newRole}'`);
        editButton.setAttribute("onclick", updatedAttr);
        alert(`User role updated to ${newRole} successfully!`);
        closeEditModal();
    });

    document.getElementById("filterButton").addEventListener("click", function(e) {
        e.stopPropagation();
        document.getElementById("filterDropdown").classList.toggle("hidden");
    });

    document.querySelectorAll(".filter-option").forEach(option => {
        option.addEventListener("click", function(e) {
            e.preventDefault();
            const role = this.getAttribute("data-role");
            document.querySelectorAll(".user-row").forEach(row => {
                if (role === "all" || row.getAttribute("data-role") === role) {
                    row.classList.remove("hidden");
                } else {
                    row.classList.add("hidden");
                }
            });
            document.getElementById("filterDropdown").classList.add("hidden");
        });
    });

    document.addEventListener("click", function(e) {
        const dropdown = document.getElementById("filterDropdown");
        const filterBtn = document.getElementById("filterButton");
        if (!dropdown.contains(e.target) && !filterBtn.contains(e.target)) {
            dropdown.classList.add("hidden");
        }
    });
</script>
</body>

