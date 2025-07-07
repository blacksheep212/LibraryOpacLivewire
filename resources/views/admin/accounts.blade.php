<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Settings - USEP Library</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            usepmaroon: '#800000',
            usepgold: '#FFD700',
            usepgoldlight: 'rgba(255, 215, 0, 0.1)',
          },
          boxShadow: {
            'usep': '0 4px 6px -1px rgba(128, 0, 0, 0.1), 0 2px 4px -1px rgba(128, 0, 0, 0.06)',
          }
        }
      }
    }
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    .profile-container {
      transition: all 0.3s ease;
    }
    .profile-container:hover {
      transform: translateY(-2px);
    }
    .remove-btn {
      transition: all 0.2s ease;
    }
    .remove-btn:hover {
      transform: scale(1.1);
    }
    .input-focus:focus {
      box-shadow: 0 0 0 3px rgba(128, 0, 0, 0.2);
    }
  </style>
</head>
<body class="bg-gray-50 font-sans">
<div id="account-settings" class="p-8 max-w-5xl mx-auto">
  <!-- Header Section -->
  <div class="mb-8">
    <h2 class="text-3xl font-bold text-usepmaroon">Add Staff Account</h2>
    <p class="text-gray-500 mt-1">Add staff profile details</p>
  </div>

  <div class="bg-white  rounded-xl shadow-usep">
    <!-- Profile Picture Section -->
    <div class="mb-8">
      <h3 class="text-lg font-semibold text-gray-800 mb-4">Profile Details</h3>
      <div class="flex flex-col items-start space-y-4">
        <div class="profile-container relative group">
          <!-- Image Preview -->
          <div id="image-preview" class="hidden">
            <img id="preview-image" src="#" alt="Profile Preview" class="w-32 h-32 rounded-full object-cover border-4 border-usepgold shadow-lg transform transition duration-300 group-hover:scale-105">
            <button onclick="removeImage()" class="remove-btn absolute -top-2 -right-2 bg-usepmaroon text-white rounded-full w-8 h-8 flex items-center justify-center shadow-md hover:bg-red-700">
              <i class="fas fa-times text-sm"></i>
            </button>
          </div>
          <!-- Placeholder -->
          <div id="image-placeholder" class="w-32 h-32 rounded-full bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center shadow-inner border-2 border-dashed border-gray-300 hover:border-usepmaroon transition-colors">
            <i class="fas fa-user text-gray-400 text-4xl"></i>
          </div>
        </div>
        <div class="flex space-x-3">
          <label class="px-4 py-2 bg-usepmaroon text-white rounded-lg hover:bg-usepmaroon/90 cursor-pointer flex items-center shadow-sm transition-all hover:shadow">
            <i class="fas fa-upload mr-2"></i>Upload new photo
            <input type="file" id="image-upload" class="hidden" accept="image/jpeg,image/png,image/gif">
          </label>
          <button onclick="removeImage()" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 flex items-center shadow-sm transition-all hover:shadow">
            <i class="fas fa-redo mr-2"></i>Reset
          </button>
        </div>
        <p class="text-sm text-gray-500">Allowed JPG, GIF or PNG. Max size of 2MB</p>
      </div>
    </div>

    <!-- Form Fields -->
    <div class="space-y-6">
      <!-- First Row -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
          <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm input-focus transition">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Middle Name</label>
          <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm input-focus transition">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
          <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm input-focus transition">
        </div>
      </div>

      <!-- Second Row -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Position</label>
          <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm input-focus transition">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">E-mail</label>
          <input type="email" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm input-focus transition">
        </div>
      </div>

      <!-- Third Row -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Mobile Number</label>
          <div class="flex">
            <select class="w-1/4 px-3 py-2.5 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon bg-gray-50">
              <option>PH (+63)</option>
            </select>
            <input type="tel" class="w-3/4 px-4 py-2.5 border-t border-r border-b border-gray-300 rounded-r-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm input-focus transition" value="">
          </div>
        </div>
      </div>

      <!-- Fourth Row -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
          <input type="text" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm input-focus transition">
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
          <div class="relative">
            <input type="password" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon shadow-sm input-focus transition" value="">
            <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-usepmaroon">
              <i class="fas fa-eye"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Save Button -->
    <div class="flex justify-end mt-8">
      <button class="px-8 py-3 bg-usepmaroon text-white rounded-lg hover:bg-usepmaroon/90 flex items-center shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5">
        <i class="fas fa-save mr-2"></i>Save Changes
      </button>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Image Upload Preview
    const imageUpload = document.getElementById('image-upload');
    const imagePreview = document.getElementById('image-preview');
    const previewImage = document.getElementById('preview-image');
    const imagePlaceholder = document.getElementById('image-placeholder');

    imageUpload.addEventListener('change', function() {
      if (this.files && this.files[0]) {
        // Check file size (max 2MB)
        if (this.files[0].size > 2 * 1024 * 1024) {
          alert('File size exceeds 2MB limit');
          return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
          previewImage.src = e.target.result;
          imagePlaceholder.style.display = 'none';
          imagePreview.style.display = 'block';
        }
        reader.readAsDataURL(this.files[0]);
      }
    });

    // Password visibility toggle
    const passwordInput = document.querySelector('input[type="password"]');
    const eyeButton = document.querySelector('input[type="password"] + button');

    if (eyeButton) {
      eyeButton.addEventListener('click', function(e) {
        e.preventDefault();
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        eyeButton.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
      });
    }
  });

  function removeImage() {
    const imageUpload = document.getElementById('image-upload');
    const imagePreview = document.getElementById('image-preview');
    const imagePlaceholder = document.getElementById('image-placeholder');

    imageUpload.value = '';
    imagePreview.style.display = 'none';
    imagePlaceholder.style.display = 'flex';
  }
</script>
</body>
</html>