@extends('layouts.app')

@section('content')
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body, html {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 50%, #2d2d2d 100%);
        }
        
        .gradient-orange {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 50%, #ff8c42 100%);
        }
        
        .gradient-dark {
            background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 50%, #2d2d2d 100%);
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glow-orange {
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
        }
        
        .glow-orange-strong {
            box-shadow: 0 0 30px rgba(255, 107, 53, 0.5);
        }
        
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(255, 107, 53, 0.2);
        }
        
        .filter-btn {
            transition: all 0.3s ease;
        }
        
        .filter-btn.active {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.4);
        }
        
        .vehicle-card {
            background: linear-gradient(145deg, #1a1a1a, #2d2d2d);
            border: 1px solid #333;
        }
        
        .vehicle-card:hover {
            border-color: #ff6b35;
        }
        
        .stats-card {
            background: linear-gradient(145deg, #1f2937, #374151);
            border: 1px solid #4b5563;
        }
        
        .pulse-glow {
            animation: pulseGlow 2s infinite;
        }
        
        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 20px rgba(255, 107, 53, 0.3); }
            50% { box-shadow: 0 0 40px rgba(255, 107, 53, 0.6); }
        }
        
        .search-container {
            position: relative;
        }
        
        .search-input {
            background: rgba(0, 0, 0, 0.8);
            border: 2px solid #333;
            color: white;
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            border-color: #ff6b35;
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
        }
        
        .availability-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .available {
            background: #10b981;
            color: white;
        }
        
        .rented {
            background: #ef4444;
            color: white;
        }
        
        .maintenance {
            background: #f59e0b;
            color: white;
        }

        /* Welcome Section Styles */
        .welcome-card {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .recent-activity {
            background: linear-gradient(145deg, #1f2937, #374151);
            border: 1px solid #4b5563;
            border-radius: 12px;
            padding: 1.5rem;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            background: rgba(255, 107, 53, 0.05);
            border-radius: 8px;
            border-left: 4px solid #ff6b35;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            background: rgba(255, 107, 53, 0.1);
            transform: translateX(5px);
        }

        /* --- Vehicle Memory Game Styles --- */
        .minigame-container {
            background: linear-gradient(135deg, #18181b 70%, #23263f 100%);
            border: 2px solid #ff6b35;
            border-radius: 20px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }
        .game-board {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            max-width: 400px;
            margin: 0 auto;
        }
        .game-card {
            aspect-ratio: 1;
            background: #111;
            border: 2px solid #333;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 2rem;
        }
        .game-card:hover {
            border-color: #ff6b35;
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
            transform: scale(1.05);
        }
        .game-card.flipped {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
        }
        .game-card.matched {
            background: #10b981;
            border-color: #10b981;
        }
        .game-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .stat-item {
            text-align: center;
            padding: 1rem;
            background: rgba(255, 107, 53, 0.1);
            border-radius: 12px;
            border: 1px solid #ff6b35;
        }
        .game-btn {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .game-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);
        }
    </style>
     
    <div class="min-h-screen bg-transparent text-white">
        <!-- Setelah navbar -->
        <div class="pt-24 px-6"> <!-- ganti p-6 menjadi pt-24 px-6 -->
            <div class="welcome-card text-white relative z-10">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold mb-2">
                            Welcome To VehiClick, {{ Auth::check() ? Auth::user()->name : 'Guest' }}!
                        </h1>
                        <p class="text-xl opacity-90">Ready to explore our vehicle collection?</p>
                    </div>
                    <div class="text-right">
                        <div class="text-3xl font-bold">{{ date('d') }}</div>
                        <div class="text-lg">{{ date('M Y') }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-screen-xl mx-auto px-6">
        <!-- Quick Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-car text-orange-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gradient">{{ $jumlahMobil }}</h3>
                    <p class="text-gray-300">Available Cars</p>
                </div>
                
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-motorcycle text-orange-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gradient">{{ $jumlahMotor }}</h3>
                    <p class="text-gray-300">Available Motorcycles</p>
                </div>
                    
                <div class="stats-card rounded-xl p-6 text-center">
                    <div class="flex items-center justify-center mb-4">
                        <i class="fas fa-check-circle text-orange-400 text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gradient">{{ $jumlah }}</h3>
                    <p class="text-gray-300">All Vehicles Registered</p>
                </div>
            </div>
        
            <!-- Search and Filter Section -->
            <div class="bg-gray-800 rounded-xl p-6 mb-8">
                <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
                    <!-- Search Bar -->
                    <div class="search-container w-full lg:w-1/2">
                        <input type="text" 
                               id="searchInput"
                               placeholder="Search vehicles by name, model, or license plate..." 
                                class="search-input w-full px-4 py-3 rounded-lg focus:outline-none">
                        <i class="fas fa-search absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                        
                    <!-- Category Filters -->
                    <div class="flex flex-wrap gap-3">
                        <button class="filter-btn active px-6 py-2 rounded-full bg-gray-700 text-white font-medium" data-category="all">
                            All Vehicles
                        </button>
                        <button class="filter-btn px-6 py-2 rounded-full bg-gray-700 text-white font-medium" data-category="Mobil">
                            <i class="fas fa-car mr-2"></i>Cars
                        </button>
                        <button  class="filter-btn px-6 py-2 rounded-full bg-gray-700 text-white font-medium" data-category="Motor">
                            <i class="fas fa-motorcycle mr-2"></i>Motorcycles
                        </button>
                    </div>
                </div>
            </div>

            <!-- Available Vehicles Section -->
            <div class="max-w-screen-xl mx-auto px-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-3xl font-bold">
                        Ketersediaan <span class="text-gradient">Kendaraan</span>
                    </h2>
                    <span class="text-gray-400">Found {{ $jumlah }} Vehicles</span>
                </div>
            </div>

            <!-- Vehicles Grid -->
            <div class="flex justify-center">
                @include('components.product_card')
            </div>

            <!-- Pagination Centered and Styled -->
            <div class="flex flex-col items-center mt-12 pb-8">
                <div class="bg-gray-800 rounded-full px-4 py-2 shadow-lg flex items-center gap-2 mb-2">
                    {{ $barangs->links('pagination::tailwind') }}
                </div>
                
            </div>

            <!-- Vehicle Memory Game Section -->
            <div class="max-w-screen-xl mx-auto px-6 mb-8">
                <div class="minigame-container">
                    <div class="text-center mb-6">
                        <h2 class="text-3xl font-bold mb-2">
                            Vehicle <span class="text-gradient">Memory Game</span>
                        </h2>
                        <p class="text-gray-300">Match the vehicle pairs to win!</p>
                    </div>
                    <div class="game-stats">
                        <div class="stat-item">
                            <div class="text-2xl font-bold text-gradient" id="moves">0</div>
                            <div class="text-sm text-gray-300">Moves</div>
                        </div>
                        <div class="stat-item">
                            <div class="text-2xl font-bold text-gradient" id="timer">00:00</div>
                            <div class="text-sm text-gray-300">Time</div>
                        </div>
                        <div class="stat-item">
                            <div class="text-2xl font-bold text-gradient" id="score">0</div>
                            <div class="text-sm text-gray-300">Score</div>
                        </div>
                    </div>
                    <div class="game-board" id="gameBoard">
                        <!-- Cards will be generated by JavaScript -->
                    </div>
                    <div class="text-center mt-6">
                        <button class="game-btn" onclick="startNewGame()">New Game</button>
                        <button class="game-btn ml-4" onclick="resetGame()">Reset</button>
                    </div>
                </div>
            </div>
            <!-- End Vehicle Memory Game Section -->

        </div>

        <!-- Footer -->
        <footer class="bg-gray-900">
            @include('components.footer')
        </footer>

    </div>

    <script>
        // Filter functionality
        const filterButtons = document.querySelectorAll('.filter-btn');
        const vehicleCards = document.querySelectorAll('.vehicle-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                button.classList.add('active');

                const category = button.getAttribute('data-category');

                vehicleCards.forEach(card => {
                    if (category === 'all' || card.getAttribute('data-category') === category) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'scale(1)';
                        }, 50);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'scale(0.8)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            
            vehicleCards.forEach(card => {
                const vehicleName = card.querySelector('h3').textContent.toLowerCase();
                const licensePlate = card.querySelector('p').textContent.toLowerCase();
                
                if (vehicleName.includes(searchTerm) || licensePlate.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Add hover effects to cards
        vehicleCards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.querySelector('img').style.transform = 'scale(1.1)';
            });
            
            card.addEventListener('mouseleave', () => {
                card.querySelector('img').style.transform = 'scale(1)';
            });
        });

        // Add loading animation
        window.addEventListener('load', () => {
            vehicleCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });

        // Initialize cards with animation
        vehicleCards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.5s ease';
        });

        // Book Now button functionality
        document.querySelectorAll('.vehicle-card button').forEach(button => {
            if (button.textContent.includes('Book Now')) {
                button.addEventListener('click', (e) => {
                    const card = e.target.closest('.vehicle-card');
                    const vehicleName = card.querySelector('h3').textContent;
                    alert(`Booking process started for ${vehicleName}!`);
                });
            }
        });

        // --- Vehicle Memory Game Logic ---
        const vehicleIcons = ['🚗', '🏍️', '🚙', '🚕', '🚐', '🚛', '🏎️', '🚜'];
        let gameBoard = [];
        let flippedCards = [];
        let moves = 0;
        let score = 0;
        let timer = 0;
        let gameTimer;
        let isGameActive = false;

        function initializeGame() {
            const cards = [...vehicleIcons, ...vehicleIcons];
            gameBoard = cards.sort(() => Math.random() - 0.5);
            renderBoard();
            resetStats();
        }

        function renderBoard() {
            const board = document.getElementById('gameBoard');
            board.innerHTML = '';
            gameBoard.forEach((icon, index) => {
                const card = document.createElement('div');
                card.className = 'game-card';
                card.dataset.index = index;
                card.dataset.icon = icon;
                card.addEventListener('click', flipCard);
                board.appendChild(card);
            });
        }

        function flipCard(e) {
            if (!isGameActive) startTimer();
            const card = e.target;
            if (card.classList.contains('flipped') || card.classList.contains('matched')) return;
            if (flippedCards.length >= 2) return;
            card.classList.add('flipped');
            card.textContent = card.dataset.icon;
            flippedCards.push(card);
            if (flippedCards.length === 2) {
                moves++;
                document.getElementById('moves').textContent = moves;
                checkMatch();
            }
        }

        function checkMatch() {
            const [card1, card2] = flippedCards;
            if (card1.dataset.icon === card2.dataset.icon) {
                setTimeout(() => {
                    card1.classList.add('matched');
                    card2.classList.add('matched');
                    score += 10;
                    document.getElementById('score').textContent = score;
                    flippedCards = [];
                    checkWin();
                }, 500);
            } else {
                setTimeout(() => {
                    card1.classList.remove('flipped');
                    card2.classList.remove('flipped');
                    card1.textContent = '';
                    card2.textContent = '';
                    flippedCards = [];
                }, 1000);
            }
        }

        function checkWin() {
            const matchedCards = document.querySelectorAll('.matched');
            if (matchedCards.length === gameBoard.length) {
                clearInterval(gameTimer);
                setTimeout(() => {
                    alert(`Congratulations! You won in ${moves} moves and ${formatTime(timer)}!`);
                }, 500);
            }
        }

        function startTimer() {
            if (isGameActive) return;
            isGameActive = true;
            gameTimer = setInterval(() => {
                timer++;
                document.getElementById('timer').textContent = formatTime(timer);
            }, 1000);
        }

        function formatTime(seconds) {
            const mins = Math.floor(seconds / 60);
            const secs = seconds % 60;
            return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
        }

        function resetStats() {
            moves = 0;
            score = 0;
            timer = 0;
            isGameActive = false;
            document.getElementById('moves').textContent = '0';
            document.getElementById('score').textContent = '0';
            document.getElementById('timer').textContent = '00:00';
            flippedCards = [];
            if (gameTimer) clearInterval(gameTimer);
        }

        function startNewGame() {
            initializeGame();
        }

        function resetGame() {
            resetStats();
            document.querySelectorAll('.game-card').forEach(card => {
                card.classList.remove('flipped', 'matched');
                card.textContent = '';
            });
        }

        // Initialize game on page load
        document.addEventListener('DOMContentLoaded', initializeGame);
    </script>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection