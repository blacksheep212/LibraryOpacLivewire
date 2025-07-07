<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>USeP Campus Library - Student ID Scanner</title>
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
        .scanner-active {
            box-shadow: 0 0 0 3px rgba(0, 255, 0, 0.5);
            animation: pulse 1.5s infinite;
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(0, 255, 0, 0.5); }
            70% { box-shadow: 0 0 0 10px rgba(0, 255, 0, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 255, 0, 0); }
        }
        .student-card {
            transition: all 0.3s ease;
            transform: translateY(20px);
            opacity: 0;
        }
        .student-card.show {
            transform: translateY(0);
            opacity: 1;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-md">
    <div class="text-center mb-8">
        <img src="{{ asset('images/usep-logo-small.png') }}"  alt="USeP Logo" class="h-16 mx-auto mb-4">

        <h1 class="text-2xl font-bold text-usepmaroon mb-2">USeP Campus Library</h1>
        <p class="text-gray-600">Please scan your Student ID</p>
    </div>

    <div class="space-y-6">
        <!-- Scanner Input (hidden but focused) -->
        <input
                type="text"
                id="studentId"
                name="studentId"
                class="absolute opacity-0"
                autofocus
        >

        <!-- Scanner Status -->
        <div class="flex items-center p-3 bg-gray-50 rounded-lg border border-gray-200">
            <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
            <span class="text-sm text-gray-700">Scanner ready - scan your ID now</span>
        </div>

        <!-- Student Display Card (initially hidden) -->
        <div id="studentCard" class="student-card hidden bg-usepgold/10 border border-usepgold rounded-lg p-4">
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <img id="studentImage" src="https://via.placeholder.com/80/800000/ffffff?text=IMG" alt="Student" class="w-16 h-16 rounded-full border-2 border-usepmaroon">
                </div>
                <div>
                    <h3 id="studentName" class="text-lg font-bold text-usepmaroon">Student Name</h3>
                    <p id="studentIdDisplay" class="text-sm text-gray-600">ID: 2023-12345</p>
                    <p id="studentProgram" class="text-sm text-gray-600">BS Computer Science</p>
                </div>
            </div>
        </div>

        <!-- Status Message -->
        <div id="statusMessage" class="text-center text-sm text-gray-500 hidden">
            <i class="fas fa-spinner fa-spin mr-2"></i>
            <span>Verifying student information...</span>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const studentIdInput = document.getElementById('studentId');
        const studentCard = document.getElementById('studentCard');
        const studentImage = document.getElementById('studentImage');
        const studentName = document.getElementById('studentName');
        const studentIdDisplay = document.getElementById('studentIdDisplay');
        const studentProgram = document.getElementById('studentProgram');
        const statusMessage = document.getElementById('statusMessage');

        // In a real implementation, this would connect to the hardware
        // For demo purposes, we'll simulate the hardware input

        // Focus the hidden input immediately
        studentIdInput.focus();

        // Simulate hardware scanner input
        studentIdInput.addEventListener('input', function(e) {
            // Only process if we have a complete ID (assuming IDs are 10 chars)
            if (this.value.length >= 10) {
                // Show loading status
                statusMessage.classList.remove('hidden');
                studentCard.classList.add('hidden');

                // Simulate backend verification delay
                setTimeout(() => {
                    // This would come from your backend in a real implementation
                    const studentData = getStudentData(this.value);

                    // Update the student card
                    studentImage.src = studentData.image;
                    studentName.textContent = studentData.name;
                    studentIdDisplay.textContent = `ID: ${this.value}`;
                    studentProgram.textContent = studentData.program;

                    // Show the card
                    statusMessage.classList.add('hidden');
                    studentCard.classList.remove('hidden');
                    studentCard.classList.add('show');

                    // Clear the input for next scan
                    this.value = '';

                    // Refocus for next scan
                    setTimeout(() => this.focus(), 100);
                }, 1000);
            }
        });

        // Sample student data (in real app this would come from your backend)
        function getStudentData(studentId) {
            const students = {
                '2023123456': {
                    name: 'Juan Dela Cruz',
                    program: 'BS Computer Science',
                    image: 'https://randomuser.me/api/portraits/men/1.jpg'
                },
                '2023987654': {
                    name: 'Maria Santos',
                    program: 'BS Information Technology',
                    image: 'https://randomuser.me/api/portraits/women/1.jpg'
                },
                '2023567890': {
                    name: 'Pedro Reyes',
                    program: 'BS Electronics Engineering',
                    image: 'https://randomuser.me/api/portraits/men/2.jpg'
                }
            };

            // Return matching student or a default if not found
            return students[studentId] || {
                name: 'Verified Student',
                program: 'Undergraduate Program',
                image: 'https://via.placeholder.com/80/800000/ffffff?text=USeP'
            };
        }

        // Prevent form submission if Enter is pressed
        studentIdInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
            }
        });
    });
</script>
</body>
</html></title>
</head>
<body>

</body>
</html>
