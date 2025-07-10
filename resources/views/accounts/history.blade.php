@extends('admin.admin')

@section('content')
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
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .home-icon {
            color: #800000;
            font-size: 1.25rem;
            transition: all 0.3s ease;
        }
        .home-icon:hover {
            color: #600000;
            transform: scale(1.1);
        }
    </style>
    <div class="bg-white rounded-xl shadow p-6">
        <div class="header-container mb-6">
            <h3 class="text-lg font-semibold text-gray-800">Admin History Logs</h3>
            <a href="{{ route('admin.dashboard') }}" class="home-icon">
                <i class="fas fa-home"></i>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                <tr class="bg-gray-50">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-06-15 14:32</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Login</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">admin@example.com</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Successful login from 192.168.1.1</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-06-15 10:15</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">User Update</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">admin@example.com</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Updated user profile ID 42</td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-06-14 16:45</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Password Reset</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">system</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Automatic password reset for user@example.com</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-end">
            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 shadow-sm">
                Clear History
            </button>
        </div>
    </div>
@endsection
