<div id="content-container" class="h-full bg-white border border-gray-200 rounded-lg shadow-sm p-8 space-y-6">
    <div id="dashboard-content">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-usepmaroon">Library Dashboard</h1>
            <div class="flex items-center gap-4">
                <div class="relative">
                    <select id="year-selector" class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon">
                        <option>2025</option>
                        <option>2024</option>
                        <option>2023</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white border border-gray-200 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-2xl font-bold text-usepmaroon">12,345</div>
                        <div class="text-gray-500">Total Books</div>
                    </div>
                    <div class="bg-usepgold/20 p-4 rounded-full">
                        <i class="fa-solid fa-book text-2xl text-usepgold"></i>
                    </div>
                </div>
                <p class="text-sm text-gray-500 mt-4">
                    <span class="text-green-500 font-medium">+5.2%</span> from last year
                </p>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-2xl font-bold text-usepmaroon">1,234</div>
                        <div class="text-gray-500">Total Users</div>
                    </div>
                    <div class="bg-usepgold/20 p-4 rounded-full">
                        <i class="fa-solid fa-users text-2xl text-usepgold"></i>
                    </div>
                </div>
                <p class="text-sm text-gray-500 mt-4">
                    <span class="text-green-500 font-medium">+8.7%</span> from last year
                </p>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-2xl font-bold text-usepmaroon">2,345</div>
                        <div class="text-gray-500">Borrowed Books</div>
                    </div>
                    <div class="bg-usepgold/20 p-4 rounded-full">
                        <i class="fa-solid fa-book-open-reader text-2xl text-usepgold"></i>
                    </div>
                </div>
                <p class="text-sm text-gray-500 mt-4">
                    <span class="text-green-500 font-medium">+12.8%</span> from last year
                </p>
            </div>

            <div class="bg-white border border-gray-200 rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-2xl font-bold text-usepmaroon">345</div>
                        <div class="text-gray-500">Monthly Users Borrow</div>
                    </div>
                    <div class="bg-usepgold/20 p-4 rounded-full">
                        <i class="fa-solid fa-calendar-days text-2xl text-usepgold"></i>
                    </div>
                </div>
                <div class="relative mt-2">
                    <select id="month-selector" class="appearance-none w-full bg-white border border-gray-300 rounded-lg px-3 py-1 pr-8 text-sm focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class="fa-solid fa-chevron-down text-xs"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Borrowing Trends Chart -->
        <div class="bg-white border border-gray-200 rounded-lg shadow p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-800 whitespace-nowrap">Borrowing Trends</h3>
                <div class="flex gap-2">
                    <button id="monthly-btn" class="px-3 py-1 text-sm bg-usepmaroon text-white rounded-lg">Monthly</button>
                    <button id="yearly-btn" class="px-3 py-1 text-sm bg-gray-100 text-gray-600 rounded-lg">Yearly</button>
                </div>
            </div>
            <div class="chart-container">
                <canvas id="borrowingChart"></canvas>
            </div>
        </div>

        <!-- Design note: Fixed the "Borrowing Trends" heading to prevent it from breaking across lines -->
    </div>
</div>

@push('scripts')
    <script>
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
        }

        // Update chart data
        function updateChartData() {
            const newData = getChartData();
            borrowingChart.data.labels = newData.labels;
            borrowingChart.data.datasets[0].data = newData.datasets[0].data;
            borrowingChart.data.datasets[1].data = newData.datasets[1].data;
            borrowingChart.update();
        }

        // Initialize chart when page loads
        document.addEventListener('DOMContentLoaded', function() {
            initChart();

            // Set current month and year
            const currentMonth = new Date().getMonth() + 1;
            document.getElementById('month-selector').value = currentMonth;

            // Update chart when selectors change
            document.getElementById('year-selector').addEventListener('change', updateChartData);
            document.getElementById('month-selector').addEventListener('change', updateChartData);

            // Toggle between monthly and yearly views
            document.getElementById('monthly-btn').addEventListener('click', function() {
                this.classList.add('bg-usepmaroon', 'text-white');
                this.classList.remove('bg-gray-100', 'text-gray-600');
                document.getElementById('yearly-btn').classList.add('bg-gray-100', 'text-gray-600');
                document.getElementById('yearly-btn').classList.remove('bg-usepmaroon', 'text-white');
                updateChartData();
            });

            document.getElementById('yearly-btn').addEventListener('click', function() {
                this.classList.add('bg-usepmaroon', 'text-white');
                this.classList.remove('bg-gray-100', 'text-gray-600');
                document.getElementById('monthly-btn').classList.add('bg-gray-100', 'text-gray-600');
                document.getElementById('monthly-btn').classList.remove('bg-usepmaroon', 'text-white');
                updateChartData();
            });
        });
    </script>
@endpush
