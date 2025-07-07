<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .desktop-tab { transition: all 0.3s ease; cursor: pointer; }
    .desktop-tab { background-color: white; color: #800000; font-weight: 600; box-shadow: 0 1px 3px rgba(0,0,0,0.1);}
     { transition: all 0.3s ease; }
     { transform: rotate(180deg);}
    @media (min-width: 768px) {
        { display: none; }
        .desktop-tabs { display: block; }
    }
</style>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .toggle-password { cursor: pointer; }
    .otp-input {
        width: 40px;
        height: 40px;
        text-align: center;
        margin: 0 5px;
    }
</style>

<div id="security-content">
    <div class="tab-content bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-6">Change Password</h3>

        <!-- Current Password -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
            <div class="relative">
                <input type="password" id="current-password" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                <button class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-500">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <!-- New Password -->
        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
            <div class="relative">
                <input type="password" id="new-password" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                <button class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-500">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            <div class="mt-2 text-xs text-gray-500">
                <p>Password must contain:</p>
                <ul class="list-disc pl-5">
                    <li>At least 8 characters</li>
                    <li>One uppercase letter</li>
                    <li>One lowercase letter</li>
                    <li>One number</li>
                    <li>One special character</li>
                </ul>
            </div>
        </div>

        <!-- Confirm New Password -->
        <div class="mb-8">
            <label class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
            <div class="relative">
                <input type="password" id="confirm-password" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
                <button class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-500">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
        </div>

        <!-- OTP Verification Section -->
        <div id="otp-section" class="hidden mb-8 p-4 bg-blue-50 rounded-lg border border-blue-200">
            <h4 class="text-md font-medium text-gray-800 mb-4">Verify Your Identity</h4>
            <p class="text-sm text-gray-600 mb-4">We've sent a 6-digit verification code to your email. Please enter it below:</p>
            <div class="flex justify-center mb-4">
                <input type="text" maxlength="1" class="otp-input border border-gray-300 rounded-lg" oninput="moveToNext(this, 1)">
                <input type="text" maxlength="1" class="otp-input border border-gray-300 rounded-lg" oninput="moveToNext(this, 2)">
                <input type="text" maxlength="1" class="otp-input border border-gray-300 rounded-lg" oninput="moveToNext(this, 3)">
                <input type="text" maxlength="1" class="otp-input border border-gray-300 rounded-lg" oninput="moveToNext(this, 4)">
                <input type="text" maxlength="1" class="otp-input border border-gray-300 rounded-lg" oninput="moveToNext(this, 5)">
                <input type="text" maxlength="1" class="otp-input border border-gray-300 rounded-lg" oninput="moveToNext(this, 6)">
            </div>
            <div class="flex items-center justify-between">
                <button id="resend-otp" class="text-sm text-blue-600 hover:underline disabled:text-gray-400" disabled>
                    Resend code in <span id="countdown">60</span> seconds
                </button>
                <button id="verify-otp" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-sm">
                    Verify
                </button>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4 mt-8">
            <button id="cancel-btn" class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 shadow-sm">
                Cancel
            </button>
            <button id="request-otp-btn" class="px-6 py-2.5 bg-usepmaroon text-white rounded-lg hover:bg-usepmaroon/90 ">
                Request OTP
            </button>
            <button id="change-password-btn" class="hidden px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 shadow-sm">
                Change Password
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Password visibility toggle
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const input = this.previousElementSibling;
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
        });

        // OTP Request Flow
        const requestOtpBtn = document.getElementById('request-otp-btn');
        const otpSection = document.getElementById('otp-section');
        const changePasswordBtn = document.getElementById('change-password-btn');
        const cancelBtn = document.getElementById('cancel-btn');
        const resendOtpBtn = document.getElementById('resend-otp');
        const verifyOtpBtn = document.getElementById('verify-otp');
        let countdownInterval;

        if (requestOtpBtn) {
            requestOtpBtn.addEventListener('click', function() {
                const currentPassword = document.getElementById('current-password').value;
                const newPassword = document.getElementById('new-password').value;
                const confirmPassword = document.getElementById('confirm-password').value;

                if (!currentPassword || !newPassword || !confirmPassword) {
                    alert('Please fill in all password fields');
                    return;
                }

                if (newPassword !== confirmPassword) {
                    alert('New passwords do not match');
                    return;
                }

                otpSection.classList.remove('hidden');
                requestOtpBtn.classList.add('hidden');
                changePasswordBtn.classList.remove('hidden');
                startCountdown();
            });
        }

        if (cancelBtn) {
            cancelBtn.addEventListener('click', function() {
                otpSection.classList.add('hidden');
                requestOtpBtn.classList.remove('hidden');
                changePasswordBtn.classList.add('hidden');
                clearInterval(countdownInterval);
                document.getElementById('countdown').textContent = '60';
                resendOtpBtn.disabled = true;
                document.querySelectorAll('.otp-input').forEach(input => input.value = '');
            });
        }

        if (resendOtpBtn) {
            resendOtpBtn.addEventListener('click', function() {
                startCountdown();
            });
        }

        if (verifyOtpBtn) {
            verifyOtpBtn.addEventListener('click', function() {
                const otpInputs = document.querySelectorAll('.otp-input');
                let otp = '';
                otpInputs.forEach(input => otp += input.value);

                if (otp.length !== 6) {
                    alert('Please enter the complete 6-digit OTP');
                    return;
                }

                alert('Password changed successfully!');
                resetForm();
            });
        }

        function startCountdown() {
            let seconds = 60;
            resendOtpBtn.disabled = true;
            clearInterval(countdownInterval);

            countdownInterval = setInterval(function() {
                seconds--;
                document.getElementById('countdown').textContent = seconds;
                if (seconds <= 0) {
                    clearInterval(countdownInterval);
                    resendOtpBtn.disabled = false;
                    document.getElementById('countdown').textContent = '60';
                }
            }, 1000);
        }

        function resetForm() {
            otpSection.classList.add('hidden');
            requestOtpBtn.classList.remove('hidden');
            changePasswordBtn.classList.add('hidden');
            clearInterval(countdownInterval);
            document.getElementById('countdown').textContent = '60';
            resendOtpBtn.disabled = true;
            document.getElementById('current-password').value = '';
            document.getElementById('new-password').value = '';
            document.getElementById('confirm-password').value = '';
            document.querySelectorAll('.otp-input').forEach(input => input.value = '');
        }

        // OTP input auto-focus
        function moveToNext(input, nextIndex) {
            if (input.value.length === 1) {
                const nextInput = document.querySelector(`.otp-input:nth-child(${nextIndex + 1})`);
                if (nextInput) nextInput.focus();
            }
        }
    });
</script>




