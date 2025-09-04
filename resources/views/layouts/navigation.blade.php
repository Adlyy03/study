<div x-data="{ open: false }" class="flex min-h-screen bg-gray-100">

  <!-- Sidebar (desktop only) -->
  <aside class="hidden sm:block w-64 bg-white shadow-md">
    <div class="p-6 font-bold text-purple-700 text-2xl">AdminPanel</div>
    <nav class="mt-8">
      <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-purple-100">Dashboard</a>
      <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-purple-100">Users</a>
      <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-purple-100">Analytics</a>
      <a href="#" class="block py-3 px-6 text-gray-700 hover:bg-purple-100">Settings</a>
    </nav>
  </aside>

  <!-- Main content area -->
  <div class="flex-1 flex flex-col">

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 shadow-md px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16 items-center">

        <!-- Hamburger for mobile sidebar toggle -->
        <div class="flex items-center sm:hidden">
          <button 
            @click="open = !open" 
            class="p-2 rounded-md text-gray-400 hover:text-gray-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-600"
            aria-label="Toggle menu"
          >
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path 
                :class="{ 'hidden': open, 'inline-flex': !open }" 
                class="inline-flex" 
                stroke-linecap="round" 
                stroke-linejoin="round" 
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" 
              />
              <path 
                :class="{ 'hidden': !open, 'inline-flex': open }" 
                class="hidden" 
                stroke-linecap="round" 
                stroke-linejoin="round" 
                stroke-width="2"
                d="M6 18L18 6M6 6l12 12" 
              />
            </svg>
          </button>
        </div>

        <!-- Title -->
        <div class="flex items-center">
          <h1 class="text-xl font-bold text-purple-700">Dashboard</h1>
        </div>

        <!-- Search and Profile -->
        <div class="hidden sm:flex items-center gap-4">
          <input 
            type="text" 
            placeholder="Search..." 
            class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" 
          >

          <!-- Profile dropdown -->
          <div x-data="{ dropdownOpen: false }" class="relative">
            <button 
              @click="dropdownOpen = !dropdownOpen" 
              class="w-10 h-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-bold focus:outline-none"
              aria-haspopup="true" aria-expanded="dropdownOpen"
            >
              dly
            </button>

            <div 
              x-show="dropdownOpen" 
              @click.away="dropdownOpen = false" 
              x-transition 
              class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-20"
            >
              <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-purple-100">Profile</a>
              <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-purple-100">
                        Log Out
                    </button>
                </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Mobile sidebar menu -->
      <div 
        :class="{ 'block': open, 'hidden': !open }" 
        class="sm:hidden"
      >
        <nav class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-gray-200">
          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-purple-100">Dashboard</a>
          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-purple-100">Users</a>
          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-purple-100">Analytics</a>
          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-purple-100">Settings</a>

          <!-- Search -->
          <input 
            type="text" 
            placeholder="Search..." 
            class="mt-3 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
          >

          <!-- Mobile profile info -->
          <div class="pt-4 border-t border-gray-200">
            <div class="text-sm text-gray-800 font-medium">SR Name</div>
            <div class="text-xs text-gray-500">sr.email@example.com</div>
          </div>

          <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:bg-purple-100">Profile</a>
          <form method="POST" action="/logout" class="px-3">
            <!-- CSRF token -->
            <button 
              type="submit" 
              class="w-full text-left px-3 py-2 rounded-md text-gray-700 hover:bg-purple-100"
            >
              Log Out
            </button>
          </form>
        </nav>
      </div>
    </nav>

    <!-- Main Content -->
    <main class="p-6 space-y-6 flex-1 bg-gray-50 overflow-auto">
      <h2 class="text-2xl font-semibold text-gray-700">Welcome to the Dashboard!</h2>
      <p>Your content goes here...</p>
    </main>
  </div>
</div>

<!-- Jangan lupa load Alpine.js di bawah -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
