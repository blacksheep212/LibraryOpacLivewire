<div id="add-content" class="h-full bg-white rounded-lg shadow-sm p-8 space-y-6">
  <h2 class="text-2xl font-bold text-usepmaroon mb-4">Add School Information</h2>

  <!-- College Form -->
  <div class="border border-gray-200 rounded-lg p-4">
    <h3 class="text-lg font-semibold text-gray-800 mb-3">Add College</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label for="college" class="block text-sm font-medium text-gray-700 mb-1">College</label>
        <input type="text" id="college" name="college" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-usepmaroon focus:border-usepmaroon">
      </div>
    </div>
    <div class="flex justify-end mt-4">
      <button class="bg-usepmaroon text-white px-4 py-2 rounded-md hover:bg-usepmaroon-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-usepmaroon">
        Save
      </button>
    </div>
  </div>

  <!-- Department Form -->
  <div class="border border-gray-200 rounded-lg p-4">
    <h3 class="text-lg font-semibold text-gray-800 mb-3">Add Department</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label for="department" class="block text-sm font-medium text-gray-700 mb-1">Department</label>
        <input type="text" id="department" name="department" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-usepmaroon focus:border-usepmaroon">
      </div>
      <div>
        <label for="department-college" class="block text-sm font-medium text-gray-700 mb-1">College</label>
        <select id="department-college" name="department-college" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-usepmaroon focus:border-usepmaroon">
          <option value="">Select College</option>
          <!-- Colleges would be populated dynamically -->
        </select>
      </div>
    </div>
    <div class="flex justify-end mt-4">
      <button class="bg-usepmaroon text-white px-4 py-2 rounded-md hover:bg-usepmaroon-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-usepmaroon">
        Save
      </button>
    </div>
  </div>

  <!-- Program Form - Specific Layout -->
  <div class="border border-gray-200 rounded-lg p-4">
    <h3 class="text-lg font-semibold text-gray-800 mb-3">Add Program</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <!-- First Row: Program Name and Dropdown -->
      <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="program" class="block text-sm font-medium text-gray-700 mb-1">Program</label>
          <input type="text" id="program" name="program" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-usepmaroon focus:border-usepmaroon">
        </div>
        <div>
          <label for="program-dropdown" class="block text-sm font-medium text-gray-700 mb-1">Program Dropdown</label>
          <select id="program-dropdown" name="program-dropdown" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-usepmaroon focus:border-usepmaroon">
            <option value="">Select Program</option>
            <!-- Programs would be populated dynamically -->
          </select>
        </div>
      </div>

      <!-- Second Row: Acronym and College -->
      <div>
        <label for="program-acronym" class="block text-sm font-medium text-gray-700 mb-1">Acronym</label>
        <input type="text" id="program-acronym" name="program-acronym" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-usepmaroon focus:border-usepmaroon">
      </div>
      <div>
        <label for="program-college" class="block text-sm font-medium text-gray-700 mb-1">College</label>
        <select id="program-college" name="program-college" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-usepmaroon focus:border-usepmaroon">
          <option value="">Select College</option>
          <!-- Colleges would be populated dynamically -->
        </select>
      </div>
    </div>
    <div class="flex justify-end mt-4">
      <button class="bg-usepmaroon text-white px-4 py-2 rounded-md hover:bg-usepmaroon-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-usepmaroon">
        Save
      </button>
    </div>
  </div>

  <!-- Office Form -->
  <div class="border border-gray-200 rounded-lg p-4">
    <h3 class="text-lg font-semibold text-gray-800 mb-3">Add Office</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label for="office" class="block text-sm font-medium text-gray-700 mb-1">Office</label>
        <input type="text" id="office" name="office" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-usepmaroon focus:border-usepmaroon">
      </div>
      <div>
        <label for="office-campus" class="block text-sm font-medium text-gray-700 mb-1">Campus</label>
        <select id="office-campus" name="office-campus" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-usepmaroon focus:border-usepmaroon">
          <option value="">Select Campus</option>
          <!-- Campuses would be populated dynamically -->
        </select>
      </div>
    </div>
    <div class="flex justify-end mt-4">
      <button class="bg-usepmaroon text-white px-4 py-2 rounded-md hover:bg-usepmaroon-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-usepmaroon">
        Save
      </button>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    console.log('Add school information page loaded');

    // Here you would typically add functionality to:
    // 1. Handle form submissions
    // 2. Fetch existing colleges/campuses for dropdowns
    // 3. Validate inputs
    // 4. Send data to backend

    // Example event listener for one of the save buttons
    document.querySelectorAll('button').forEach(button => {
      button.addEventListener('click', function() {
        const form = this.closest('.border');
        console.log('Save button clicked for:', form.querySelector('h3').textContent);
        // Add actual save functionality here
      });
    });
  });
</script>