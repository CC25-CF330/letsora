<!DOCTYPE html>
<html lang="en" x-data="{
    theme: localStorage.getItem('theme') || (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'),
    setTheme(t) {
        this.theme = t;
        localStorage.setItem('theme', t);
        if (t === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
}" x-init="setTheme(theme)" :class="{ 'dark': theme === 'dark' }" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Letsora - Report</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 h-full overflow-hidden">
    @include('layouts.partials.sidebar')

    <!-- Main Content -->
    <div class="flex-1 sm:ml-64 h-screen">
        <main class="h-full p-6 md:p-10 overflow-y-auto">
            @include('layouts.partials.header', [
                'title' => 'Laporan',
                'subtitle' => 'Pantau progres dan performa belajarmu!'
            ])

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Analysis Card -->
                <div class="bg-white dark:bg-[#1f2937] rounded-xl p-6">
                    <h3 class="text-lg font-semibold mb-4 dark:text-white">Analisis</h3>
                    <div class="flex items-center justify-center mb-4">
                        <div class="relative w-32 h-32">
                            <canvas id="analysisChart" width="128" height="128"></canvas>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-2xl font-bold dark:text-white">25%</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <span class="text-sm dark:text-gray-300">Diselesaikan</span>
                            </div>
                            <span class="text-sm text-gray-400">35%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-gray-500 rounded-full"></div>
                                <span class="text-sm dark:text-gray-300">Belum Dimulai</span>
                            </div>
                            <span class="text-sm text-gray-400">25%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                                <span class="text-sm dark:text-gray-300">Dalam Proses</span>
                            </div>
                            <span class="text-sm text-gray-400">15%</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <span class="text-sm dark:text-gray-300">Due Date</span>
                            </div>
                            <span class="text-sm text-gray-400">25%</span>
                        </div>
                    </div>
                </div>

                <!-- Academic Performance Card -->
                <div class="bg-white dark:bg-[#1f2937] rounded-xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold dark:text-white">Academic Performance</h3>
                        <div class="flex space-x-2">
                            <span class="px-3 py-1 bg-green-600 text-xs rounded-full text-white">IPK</span>
                            <span class="px-3 py-1 bg-yellow-600 text-xs rounded-full text-white">IPS</span>
                        </div>
                    </div>
                    <div class="relative h-[240px]">
                        <canvas id="performanceChart" class="w-full h-full"></canvas>
                    </div>
                    <div class="mt-4 flex items-center justify-between text-sm text-gray-400">
                        <span>X = Periode Semester</span>
                        <span>Y = Nilai rata-rata</span>
                    </div>
                    <div class="mt-2 text-right text-sm text-gray-400">
                        Avg Marks: 67
                    </div>
                </div>
            </div>

            <!-- Study Time Card -->
            <div class="bg-white dark:bg-[#1f2937] rounded-xl p-6 mb-8">
                <h3 class="text-lg font-semibold mb-4 dark:text-white">Rata-rata waktu belajar</h3>
                <div class="mb-4">
                    <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded-full overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-green-400 to-red-500 rounded-full" 
                            style="width: 70%"></div>
                    </div>
                </div>
                <div class="text-center mb-4">
                    <div class="text-2xl font-bold dark:text-white">6579</div>
                    <div class="text-sm text-gray-400">Total Waktu Belajar</div>
                </div>
                <div class="grid grid-cols-4 gap-2 text-xs">
                    <div class="text-center">
                        <div class="text-green-400 font-semibold">>3 Jam</div>
                        <div class="text-gray-400">70.04%</div>
                    </div>
                    <div class="text-center">
                        <div class="text-yellow-400 font-semibold">2 Jam</div>
                        <div class="text-gray-400">15%</div>
                    </div>
                    <div class="text-center">
                        <div class="text-orange-400 font-semibold">1 Jam</div>
                        <div class="text-gray-400">10%</div>
                    </div>
                    <div class="text-center">
                        <div class="text-red-400 font-semibold">30-0 Menit</div>
                        <div class="text-gray-400">4.96%</div>
                    </div>
                </div>
            </div>

            <!-- Task History -->
            <div class="bg-white dark:bg-[#1f2937] rounded-xl">
                <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold dark:text-white">Task History</h3>
                    <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors">
                        <i class="fas fa-external-link-alt dark:text-gray-400"></i>
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <th class="text-left p-4 font-medium text-gray-600 dark:text-gray-300">No</th>
                                <th class="text-left p-4 font-medium text-gray-600 dark:text-gray-300">Deskripsi</th>
                                <th class="text-left p-4 font-medium text-gray-600 dark:text-gray-300">From</th>
                                <th class="text-left p-4 font-medium text-gray-600 dark:text-gray-300">To</th>
                                <th class="text-left p-4 font-medium text-gray-600 dark:text-gray-300">Action</th>
                            </tr>
                        </thead>
                        <tbody id="taskTableBody">
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <td class="p-4 dark:text-gray-300">1.</td>
                                <td class="p-4 dark:text-gray-300">Task 1</td>
                                <td class="p-4 text-gray-400">12 Apr 2023</td>
                                <td class="p-4 text-gray-400">23 Apr 2023</td>
                                <td class="p-4">
                                    <button class="text-purple-400 hover:text-purple-300 flex items-center space-x-1 transition-colors">
                                        <i class="fas fa-eye"></i>
                                        <span>View Details</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <td class="p-4 dark:text-gray-300">2.</td>
                                <td class="p-4 dark:text-gray-300">Task 2</td>
                                <td class="p-4 text-gray-400">15 Apr 2023</td>
                                <td class="p-4 text-gray-400">25 Apr 2023</td>
                                <td class="p-4">
                                    <button class="text-purple-400 hover:text-purple-300 flex items-center space-x-1 transition-colors">
                                        <i class="fas fa-eye"></i>
                                        <span>View Details</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <td class="p-4 dark:text-gray-300">3.</td>
                                <td class="p-4 dark:text-gray-300">Task 3</td>
                                <td class="p-4 text-gray-400">20 Apr 2023</td>
                                <td class="p-4 text-gray-400">30 Apr 2023</td>
                                <td class="p-4">
                                    <button class="text-purple-400 hover:text-purple-300 flex items-center space-x-1 transition-colors">
                                        <i class="fas fa-eye"></i>
                                        <span>View Details</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script>
        if (localStorage.getItem('darkMode') === 'true' || 
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }

        // Initialize charts when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Analysis Chart (Doughnut)
            const analysisCtx = document.getElementById('analysisChart').getContext('2d');
            new Chart(analysisCtx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: [35, 25, 15, 25],
                        backgroundColor: ['#10b981', '#6b7280', '#eab308', '#ef4444'],
                        borderWidth: 0
                    }]
                },
                options: {
                    cutout: '70%',
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    maintainAspectRatio: false
                }
            });

            // Performance Chart (Line)
            const performanceCtx = document.getElementById('performanceChart').getContext('2d');
            new Chart(performanceCtx, {
                type: 'line',
                data: {
                    labels: ['Semester 1', 'Semester 2', 'Semester 3', 'Semester 4', 'Semester 5', 'Semester 6', 'Semester 7', 'Semester 8'],
                    datasets: [{
                        label: 'IPK',
                        data: [3.2, 3.4, 3.3, 3.6, 3.7, 3.5, 3.8, 3.9],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        fill: true,
                        tension: 0.4
                    }, {
                        label: 'IPS',
                        data: [3.1, 3.5, 3.2, 3.8, 3.6, 3.4, 3.9, 4.0],
                        borderColor: '#eab308',
                        backgroundColor: 'rgba(234, 179, 8, 0.1)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 0,
                            max: 4,
                            grid: {
                                color: 'rgba(75, 85, 99, 0.2)'
                            },
                            ticks: {
                                color: '#9ca3af'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(75, 85, 99, 0.2)'
                            },
                            ticks: {
                                color: '#9ca3af'
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>