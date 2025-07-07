<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USEP Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Custom animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .modal {
            animation: fadeIn 0.3s ease-out;
        }

        .hero-pattern {
            background-image: radial-gradient(rgba(0, 0, 0, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .search-dropdown {
            display: none;
            position: absolute;
            width: 100%;
            z-index: 50;
        }

        .search-container:hover .search-dropdown,
        .search-container:focus-within .search-dropdown {
            display: block;
        }

        .dropdown-item {
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background-color: rgba(128, 0, 0, 0.05);
        }

        /* Card hover effect */
        .collection-card {
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            z-index: 10;
        }

        .collection-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            z-index: 20;
        }

        /* Modal styles */
        .card-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .card-modal-content {
            background: white;
            padding: 2rem;
            border-radius: 1rem;
            width: 90%;
            max-width: 600px;
            position: relative;
            animation: fadeIn 0.3s ease-out;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .close-modal {
            position: absolute;
            top: 1rem;
            right: 1rem;
            cursor: pointer;
            font-size: 1.5rem;
            color: #800000;
            transition: all 0.2s ease;
            z-index: 1001;
        }

        .close-modal:hover {
            transform: rotate(90deg);
            color: #600000;
        }

        /* Counting animation */
        .counting {
            animation: pulse 1s infinite;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
<!-- Navigation -->
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex flex-col md:flex-row justify-between items-center gap-4">
        <!-- USEP Library Button -->
        <button class="text-2xl font-bold text-usepmaroon hover:text-usepmaroon/80 transition flex items-center">
            <img src="images/usep-logo-small.png" alt="USEP Logo" class="h-8 mr-2">

            USeP Library
        </button>


        <!-- Action Buttons -->
        <div class="flex items-center space-x-4">
            <button class="px-4 py-2 bg-usepmaroon text-white rounded-md hover:bg-usepmaroon/90 transition flex items-center shadow hover:shadow-md">
                <i class="fas fa-book mr-2"></i>
                <span class="hidden md:inline">Borrow Book</span>
            </button>
            <button onclick="openLoginModal()" class="px-4 py-2 border border-usepmaroon text-usepmaroon rounded-md hover:bg-usepmaroon/10 transition flex items-center shadow-sm hover:shadow">
                <i class="fas fa-sign-in-alt mr-2"></i>
                <span class="hidden md:inline">Login</span>
            </button>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="relative h-[45vh] bg-cover bg-center flex flex-col items-center justify-center mb-8 hero-pattern"
         style="background-image: url('{{ asset('images/eagle.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative z-10 text-center text-white">
        <h1 class="text-3xl font-bold">USeP Campus Library</h1>
        <p class="text-lg mt-2">Tagum-Mabini</p>
    </div>

    <!-- Search Bar - Moved inside hero section -->
    <div class="relative z-60 w-full px-4 mt-8">
        <div class="flex justify-center">
            <div class="flex-1 max-w-3xl w-full relative search-container">
                <div class="flex">
                    <!-- Dropdown on the left -->
                    <div class="relative flex-shrink-0">
                        <button id="searchTypeBtn"
                                class="flex items-center justify-between px-4 py-3 border border-gray-300 rounded-l-md bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-usepmaroon min-w-[180px]">
                            <span id="searchTypeLabel" class="whitespace-nowrap flex-shrink-0">All</span>
                            <i class="fas fa-chevron-down text-usepmaroon ml-3"></i>
                        </button>
                        <div id="searchTypeDropdown"
                             class="absolute left-0 top-full mt-1 w-56 bg-white border border-gray-300 rounded-md shadow-lg z-50 hidden">
                            <div class="dropdown-item px-4 py-2 cursor-pointer flex items-center border-b border-gray-100" data-type="Books">
                                <i class="fas fa-book mr-2 text-usepmaroon"></i> Books
                            </div>
                            <div class="dropdown-item px-4 py-2 cursor-pointer flex items-center border-b border-gray-100" data-type="Electronic Collection">
                                <i class="fas fa-laptop-code mr-2 text-usepmaroon"></i> Electronic Collection
                            </div>
                            <div class="dropdown-item px-4 py-2 cursor-pointer flex items-center border-b border-gray-100" data-type="Periodical Magazine">
                                <i class="fas fa-newspaper mr-2 text-usepmaroon"></i> Periodical Magazine
                            </div>
                            <div class="dropdown-item px-4 py-2 cursor-pointer flex items-center" data-type="Thesis and Dissertation">
                                <i class="fas fa-graduation-cap mr-2 text-usepmaroon"></i> Thesis and Dissertation
                            </div>
                        </div>
                    </div>
                    <!-- Search input -->
                    <input type="text" placeholder="Search Books..."
                           class="w-full px-4 py-3 border-t border-b border-r border-gray-300 focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon focus:outline-none">
                    <button
                            class="px-6 py-3 bg-usepmaroon text-white rounded-r-md hover:bg-usepmaroon/90 transition flex items-center justify-center shadow hover:shadow-md">
                        <i class="fas fa-search"></i>
                        <span class="ml-2 hidden md:inline">Search</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="py-12 bg-gray-50 -mt-14">
    <div class="container mx-auto">
        <!-- Collection Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 max-w-7xl mx-auto px-4 mt-5px">
            <!-- Browse Collection Card -->
            <div class="collection-card group relative bg-gradient-to-br from-white to-gray-50 p-8 rounded-xl shadow-sm hover:shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:border-usepmaroon/20"
                 onclick="showCardModal('Browse Collection', 'Explore our extensive collection of books, journals, and resources.', 'fas fa-book-open', '25,689')">
                <!-- Decorative corner accent -->
                <div class="absolute top-0 right-0 w-16 h-16 bg-usepmaroon/5 transform translate-x-8 -translate-y-8 rotate-45 transition-all duration-500 group-hover:bg-usepmaroon/10"></div>

                <div class="relative z-10">
                    <div class="text-usepmaroon text-4xl mb-4 transition-all duration-300 group-hover:text-usepmaroon/90 group-hover:scale-110 inline-block">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800 group-hover:text-usepmaroon transition-colors duration-300">Browse Collection</h3>
                    <div class="text-3xl font-bold text-usepmaroon count-animation mb-1" data-target="25689">0</div>
                    <p class="text-gray-500 mt-2 text-sm font-medium">Items available</p>

                    <!-- Hover indicator arrow -->
                    <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="inline-block text-usepmaroon/80 text-sm font-medium">Click for details
                            <i class="fas fa-arrow-right ml-1 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- New Arrivals Card -->
            <div class="collection-card group relative bg-gradient-to-br from-white to-gray-50 p-8 rounded-xl shadow-sm hover:shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:border-usepmaroon/20"
                 onclick="showCardModal('New Arrivals', 'Discover our latest additions to the library collection.', 'fas fa-star', '1,245')">
                <!-- Shining star effect -->
                <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-yellow-400 rounded-full opacity-0 group-hover:opacity-70 group-hover:animate-ping duration-1000"></div>
                    <div class="absolute top-1/3 right-1/4 w-1.5 h-1.5 bg-yellow-400 rounded-full opacity-0 group-hover:opacity-60 group-hover:animate-ping duration-700 delay-200"></div>
                </div>

                <div class="relative z-10">
                    <div class="text-usepmaroon text-4xl mb-4 transition-all duration-300 group-hover:text-yellow-500 group-hover:scale-110 inline-block">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800 group-hover:text-usepmaroon transition-colors duration-300">New Arrivals</h3>
                    <div class="text-3xl font-bold text-usepmaroon count-animation mb-1" data-target="1245">0</div>
                    <p class="text-gray-500 mt-2 text-sm font-medium">New items this month</p>

                    <!-- Hover indicator arrow -->
                    <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="inline-block text-usepmaroon/80 text-sm font-medium">Click for details
                            <i class="fas fa-arrow-right ml-1 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Top Picks Card -->
            <div class="collection-card group relative bg-gradient-to-br from-white to-gray-50 p-8 rounded-xl shadow-sm hover:shadow-lg border border-gray-100 overflow-hidden transition-all duration-300 hover:border-usepmaroon/20"
                 onclick="showCardModal('Top Picks', 'Most popular books among students and faculty.', 'fas fa-thumbs-up', '892')">
                <!-- Floating circles background -->
                <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-usepmaroon/5 rounded-full transform transition-all duration-500 group-hover:scale-150 group-hover:bg-usepmaroon/10"></div>
                <div class="absolute -top-4 -left-4 w-12 h-12 bg-usepmaroon/5 rounded-full transform transition-all duration-500 group-hover:scale-150 group-hover:bg-usepmaroon/10"></div>

                <div class="relative z-10">
                    <div class="text-usepmaroon text-4xl mb-4 transition-all duration-300 group-hover:text-green-500 group-hover:scale-110 inline-block">
                        <i class="fas fa-thumbs-up"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800 group-hover:text-usepmaroon transition-colors duration-300">Top Picks</h3>
                    <div class="text-3xl font-bold text-usepmaroon count-animation mb-1" data-target="892">0</div>
                    <p class="text-gray-500 mt-2 text-sm font-medium">Highly recommended</p>

                    <!-- Hover indicator arrow -->
                    <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="inline-block text-usepmaroon/80 text-sm font-medium">Click for details
                            <i class="fas fa-arrow-right ml-1 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Books Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-usepmaroon mb-12">Book Collection</h2>

        <!-- Book Grid - 5 columns on large screens -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 px-4">
            <!-- Book Card 1 -->
            <div class="book-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 relative group">
                <div class="relative pb-[150%] overflow-hidden">
                    <img src="https://m.media-amazon.com/images/I/71tR3ZEQZBL._AC_UF1000,1000_QL80_.jpg"
                         alt="Book Cover"
                         class="absolute h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <h3 class="text-white font-semibold text-lg">Introduction to Algorithms</h3>
                    </div>
                </div>
                <div class="p-3">
                    <p class="text-sm text-gray-600 truncate">Thomas H. Cormen</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs font-medium px-2 py-1 bg-green-100 text-green-800 rounded-full">Available</span>
                        <span class="text-xs text-gray-500">2020 Edition</span>
                    </div>
                </div>
            </div>

            <!-- Book Card 2 -->
            <div class="book-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 relative group">
                <div class="relative pb-[150%] overflow-hidden">
                    <img src="https://m.media-amazon.com/images/I/81s6DUyQCZL._AC_UF1000,1000_QL80_.jpg"
                         alt="Book Cover"
                         class="absolute h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <h3 class="text-white font-semibold text-lg">Clean Code</h3>
                    </div>
                </div>
                <div class="p-3">
                    <p class="text-sm text-gray-600 truncate">Robert C. Martin</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs font-medium px-2 py-1 bg-red-100 text-red-800 rounded-full">Checked Out</span>
                        <span class="text-xs text-gray-500">2008 Edition</span>
                    </div>
                </div>
            </div>

            <!-- Book Card 3 -->
            <div class="book-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 relative group">
                <div class="relative pb-[150%] overflow-hidden">
                    <img src="https://m.media-amazon.com/images/I/61yB0UFlM3L._AC_UF1000,1000_QL80_.jpg"
                         alt="Book Cover"
                         class="absolute h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <h3 class="text-white font-semibold text-lg">Design Patterns</h3>
                    </div>
                </div>
                <div class="p-3">
                    <p class="text-sm text-gray-600 truncate">Erich Gamma, et al.</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs font-medium px-2 py-1 bg-green-100 text-green-800 rounded-full">Available</span>
                        <span class="text-xs text-gray-500">1994 Edition</span>
                    </div>
                </div>
            </div>

            <!-- Book Card 4 -->
            <div class="book-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 relative group">
                <div class="relative pb-[150%] overflow-hidden">
                    <img src="https://m.media-amazon.com/images/I/81vpsIs58WL._AC_UF1000,1000_QL80_.jpg"
                         alt="Book Cover"
                         class="absolute h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <h3 class="text-white font-semibold text-lg">The Pragmatic Programmer</h3>
                    </div>
                </div>
                <div class="p-3">
                    <p class="text-sm text-gray-600 truncate">Andrew Hunt, David Thomas</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs font-medium px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full">Reserved</span>
                        <span class="text-xs text-gray-500">2019 Edition</span>
                    </div>
                </div>
            </div>

            <!-- Book Card 5 -->
            <div class="book-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 relative group">
                <div class="relative pb-[150%] overflow-hidden">
                    <img src="https://m.media-amazon.com/images/I/71kwaIeQeFL._AC_UF1000,1000_QL80_.jpg"
                         alt="Book Cover"
                         class="absolute h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <h3 class="text-white font-semibold text-lg">Structure and Interpretation</h3>
                    </div>
                </div>
                <div class="p-3">
                    <p class="text-sm text-gray-600 truncate">Harold Abelson, Gerald Sussman</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs font-medium px-2 py-1 bg-green-100 text-green-800 rounded-full">Available</span>
                        <span class="text-xs text-gray-500">1996 Edition</span>
                    </div>
                </div>
            </div>

            <!-- Book Card 6 -->
            <div class="book-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 relative group">
                <div class="relative pb-[150%] overflow-hidden">
                    <img src="https://m.media-amazon.com/images/I/71Hn7eOZOaL._AC_UF1000,1000_QL80_.jpg"
                         alt="Book Cover"
                         class="absolute h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <h3 class="text-white font-semibold text-lg">Code Complete</h3>
                    </div>
                </div>
                <div class="p-3">
                    <p class="text-sm text-gray-600 truncate">Steve McConnell</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs font-medium px-2 py-1 bg-green-100 text-green-800 rounded-full">Available</span>
                        <span class="text-xs text-gray-500">2004 Edition</span>
                    </div>
                </div>
            </div>

            <!-- Book Card 7 -->
            <div class="book-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 relative group">
                <div class="relative pb-[150%] overflow-hidden">
                    <img src="https://m.media-amazon.com/images/I/81dQwQlmAXL._AC_UF1000,1000_QL80_.jpg"
                         alt="Book Cover"
                         class="absolute h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <h3 class="text-white font-semibold text-lg">The Clean Coder</h3>
                    </div>
                </div>
                <div class="p-3">
                    <p class="text-sm text-gray-600 truncate">Robert C. Martin</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs font-medium px-2 py-1 bg-red-100 text-red-800 rounded-full">Checked Out</span>
                        <span class="text-xs text-gray-500">2011 Edition</span>
                    </div>
                </div>
            </div>

            <!-- Book Card 8 -->
            <div class="book-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 relative group">
                <div class="relative pb-[150%] overflow-hidden">
                    <img src="https://m.media-amazon.com/images/I/81u5jA6c2RL._AC_UF1000,1000_QL80_.jpg"
                         alt="Book Cover"
                         class="absolute h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <h3 class="text-white font-semibold text-lg">Refactoring</h3>
                    </div>
                </div>
                <div class="p-3">
                    <p class="text-sm text-gray-600 truncate">Martin Fowler</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs font-medium px-2 py-1 bg-green-100 text-green-800 rounded-full">Available</span>
                        <span class="text-xs text-gray-500">2018 Edition</span>
                    </div>
                </div>
            </div>

            <!-- Book Card 9 -->
            <div class="book-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 relative group">
                <div class="relative pb-[150%] overflow-hidden">
                    <img src="https://m.media-amazon.com/images/I/71c1LRLBTBL._AC_UF1000,1000_QL80_.jpg"
                         alt="Book Cover"
                         class="absolute h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <h3 class="text-white font-semibold text-lg">Head First Design Patterns</h3>
                    </div>
                </div>
                <div class="p-3">
                    <p class="text-sm text-gray-600 truncate">Eric Freeman, Elisabeth Robson</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs font-medium px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full">Reserved</span>
                        <span class="text-xs text-gray-500">2004 Edition</span>
                    </div>
                </div>
            </div>

            <!-- Book Card 10 -->
            <div class="book-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 relative group">
                <div class="relative pb-[150%] overflow-hidden">
                    <img src="https://m.media-amazon.com/images/I/81bGKUa1e0L._AC_UF1000,1000_QL80_.jpg"
                         alt="Book Cover"
                         class="absolute h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <h3 class="text-white font-semibold text-lg">Domain-Driven Design</h3>
                    </div>
                </div>
                <div class="p-3">
                    <p class="text-sm text-gray-600 truncate">Eric Evans</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="text-xs font-medium px-2 py-1 bg-green-100 text-green-800 rounded-full">Available</span>
                        <span class="text-xs text-gray-500">2003 Edition</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center mt-12">
            <nav class="inline-flex rounded-md shadow-sm">
                <button class="px-3 py-1 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="px-4 py-1 border-t border-b border-gray-300 bg-white text-usepmaroon font-medium">
                    1
                </button>
                <button class="px-4 py-1 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    2
                </button>
                <button class="px-4 py-1 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    3
                </button>
                <span class="px-4 py-1 border-t border-b border-gray-300 bg-white text-gray-500">
                    ...
                </span>
                <button class="px-4 py-1 border-t border-b border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    8
                </button>
                <button class="px-3 py-1 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </nav>
        </div>
    </div>
</section>

<style>
    /* Book card specific styles */
    .book-card {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .book-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }

    /* Responsive adjustments */
    @media (max-width: 640px) {
        .book-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 480px) {
        .book-grid {
            grid-template-columns: 1fr;
        }
    }
</style>





<!-- Card Modal -->
<div id="cardModal" class="card-modal">
    <div class="card-modal-content">
        <span class="close-modal" onclick="closeCardModal()">&times;</span>
        <div class="text-center">
            <div id="modalIcon" class="text-usepmaroon text-5xl mb-6"></div>
            <h3 id="modalTitle" class="text-2xl font-bold text-usepmaroon mb-2"></h3>
            <div id="modalCount" class="text-4xl font-bold text-usepmaroon mb-4 counting"></div>
            <p id="modalDescription" class="text-gray-600 mb-6"></p>
            <button onclick="closeCardModal()" class="px-6 py-2 bg-usepmaroon text-white rounded-md hover:bg-usepmaroon/90 transition font-medium">
                Close
            </button>
        </div>
    </div>
</div>

<!-- Login Modal -->
<div id="loginModal" class="fixed inset-0 bg-black bg-opacity-50 z-[1000] hidden flex items-center justify-center p-4">
    <div class="modal bg-white rounded-lg shadow-xl max-w-md w-full">
        <div class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-2xl font-bold text-usepmaroon">Login to Your Account</h3>
                <button onclick="closeLoginModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon">
                </div>

                <div class="relative">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input id="passwordInput" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-usepmaroon focus:border-usepmaroon">
                    <button type="button" onclick="togglePasswordVisibility()" class="absolute right-3 bottom-2 text-gray-400 hover:text-usepmaroon">
                        <i id="eyeIcon" class="fas fa-eye"></i>
                    </button>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="rememberMe" type="checkbox" class="h-4 w-4 text-usepmaroon focus:ring-usepmaroon border-gray-300 rounded">
                        <label for="rememberMe" class="ml-2 block text-sm text-gray-700">Remember me</label>
                    </div>
                    <button type="button" class="text-sm text-usepmaroon hover:underline">Forgot password?</button>
                </div>

                <button type="submit" class="w-full py-2 px-4 bg-usepmaroon text-white rounded-md hover:bg-usepmaroon/90 transition font-medium">
                    Login
                </button>
            </form>

            <div class="mt-4 text-center text-sm text-gray-600">
                Don't have an account? <button class="text-usepmaroon hover:underline">Contact librarian</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-usepmaroon text-white py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <h3 class="text-xl font-bold">USEP Library</h3>
                <p class="text-usepgold/80">Tagum-Mabini Campus</p>
            </div>
            <div class="flex space-x-4">
                <a href="#" class="text-white hover:text-usepgold transition">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-white hover:text-usepgold transition">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-white hover:text-usepgold transition">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="border-t border-usepgold/20 mt-6 pt-6 text-sm text-center text-usepgold/80">
            &copy; 2023 USEP Library. All rights reserved.
        </div>
    </div>
</footer>

<script>
    // Tailwind config with USEP colors
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    usepmaroon: '#800000',
                    usepgold: '#FFD700',
                }
            }
        }
    };

    // Login modal functions
    function openLoginModal() {
        document.getElementById('loginModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeLoginModal() {
        document.getElementById('loginModal').classList.add('hidden');
        document.body.style.overflow = '';
    }

    // Toggle password visibility
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('passwordInput');
        const eyeIcon = document.getElementById('eyeIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }

    // Close modal when clicking outside
    document.getElementById('loginModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeLoginModal();
        }
    });

    // Search functionality
    const searchTypeBtn = document.getElementById('searchTypeBtn');
    const searchTypeDropdown = document.getElementById('searchTypeDropdown');
    const searchTypeLabel = document.getElementById('searchTypeLabel');
    const searchInput = document.querySelector('.search-container input[type="text"]');

    searchTypeBtn.addEventListener('click', function(e) {
        e.stopPropagation();
        searchTypeDropdown.classList.toggle('hidden');
    });

    searchTypeDropdown.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function() {
            const type = this.getAttribute('data-type');
            searchTypeLabel.textContent = type;
            searchInput.placeholder = `Search ${type}...`;
            searchTypeDropdown.classList.add('hidden');
        });
    });

    document.addEventListener('click', function() {
        searchTypeDropdown.classList.add('hidden');
    });

81

    // Number counting animation
    function animateCounters() {
        const counters = document.querySelectorAll('.count-animation');
        const speed = 200; // The lower the faster

        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target').replace(/,/g, '');
            const count = +counter.innerText.replace(/,/g, '');
            const increment = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment).toLocaleString();
                setTimeout(animateCounters, 1);
            } else {
                counter.innerText = target.toLocaleString();
            }
        });
    }

    // Start counting when page loads
    window.onload = function() {
        setTimeout(animateCounters, 500);
    };

    // Card modal functions
    function showCardModal(title, description, icon, count) {
        document.getElementById('modalTitle').textContent = title;
        document.getElementById('modalDescription').textContent = description;
        document.getElementById('modalIcon').className = icon + ' text-usepmaroon';
        document.getElementById('modalCount').textContent = count;

        const modal = document.getElementById('cardModal');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeCardModal() {
        document.getElementById('cardModal').style.display = 'none';
        document.body.style.overflow = '';
    }

    // Close modal when clicking outside
    document.getElementById('cardModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeCardModal();
        }
    });

    // This would be replaced with actual data fetching in a real application
    document.addEventListener('DOMContentLoaded', function() {
        // Example of how you might handle book status
        const statusElements = document.querySelectorAll('[data-status]');

        statusElements.forEach(el => {
            const status = el.getAttribute('data-status');
            if (status === 'available') {
                el.classList.add('bg-green-100', 'text-green-800');
            } else if (status === 'checked-out') {
                el.classList.add('bg-red-100', 'text-red-800');
            } else if (status === 'reserved') {
                el.classList.add('bg-yellow-100', 'text-yellow-800');
            }
        });

        // Book click handler - would open a modal with more details
        document.querySelectorAll('.book-card').forEach(card => {
            card.addEventListener('click', function() {
                // In a real app, this would open a modal with full book details
                console.log('Book clicked - would show details modal');
            });
        });
    });
</script>
</body>
</html>
