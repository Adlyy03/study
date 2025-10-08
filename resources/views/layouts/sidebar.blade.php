<aside class="hidden w-64 bg-gradient-to-b from-[#977DFF] to-[#000C9E] md:block min-h-screen shadow-2xl">
  <div class="py-6 text-center border-b border-white/20 mb-8">
    <div class="flex items-center justify-center space-x-3 mb-2">
      <div class="w-10 h-10 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg flex items-center justify-center">
        <i class="fas fa-graduation-cap text-white text-lg"></i>
      </div>
      <div>
        <h1 class="text-xl font-bold text-white">EduSystem</h1>
        <p class="text-xs text-white/80">Admin Panel</p>
      </div>
    </div>
  </div>
  <nav class="text-sm text-white/90 px-4">
    <ul class="flex flex-col space-y-2">
      <li class="cursor-pointer">
        <a class="py-3 px-4 flex items-center rounded-lg bg-white/20 backdrop-blur-sm border border-white/30 text-white hover:bg-white/30 transition-all duration-300" href="{{ route('dashboard') }}">
          <i class="fas fa-tachometer-alt w-5 mr-3 text-white"></i>
          Dashboard
        </a>
      </li>
      <li class="py-2 text-xs uppercase tracking-wider text-white/60 font-bold mt-6 mb-2">USER MANAGEMENT</li>
      <li class="cursor-pointer">
        <a href="{{ route('students.index') }}"
          class="py-3 px-4 flex items-center rounded-lg text-white/90 hover:bg-white/20 hover:text-white transition-all duration-300">
          <i class="fas fa-user-graduate w-5 mr-3"></i>
          Students
        </a>
      </li>
      <li class="cursor-pointer">
        <a class="py-3 px-4 flex items-center rounded-lg text-white/90 hover:bg-white/20 hover:text-white transition-all duration-300" href="{{ route('users.index') }}">
          <i class="fas fa-users w-5 mr-3"></i>
          Users
        </a>
      </li>
      <li class="cursor-pointer">
        <a class="py-3 px-4 flex items-center rounded-lg text-white/90 hover:bg-white/20 hover:text-white transition-all duration-300" href="/">
          <i class="fas fa-shield-alt w-5 mr-3"></i>
          Permissions
        </a>
      </li>
      <li class="py-2 text-xs uppercase tracking-wider text-white/60 font-bold mt-6 mb-2">GURU</li>
      <li class="cursor-pointer">
        <a class="py-3 px-4 flex items-center rounded-lg text-white/90 hover:bg-white/20 hover:text-white transition-all duration-300" href="{{ route('teachers.index') }}">
          <i class="fas fa-layer-group w-5 mr-3"></i>
          Guru
        </a>
      </li>
      <li class="cursor-pointer">
        <a class="py-3 px-4 flex items-center rounded-lg text-white/90 hover:bg-white/20 hover:text-white transition-all duration-300" href="/">
          <i class="fas fa-book w-5 mr-3"></i>
          Satpam
        </a>
      </li>
      <li class="py-2 text-xs uppercase tracking-wider text-white/60 font-bold mt-6 mb-2">INVENTARIES</li>
      <li class="cursor-pointer">
        <a href="{{ route('inventories.index') }}" class="py-3 px-4 flex items-center rounded-lg text-white/90 hover:bg-white/20 hover:text-white transition-all duration-300">
          <i class="fas fa-shopping-cart w-5 mr-3"></i>
          Orders
        </a>
      </li>
      <li class="cursor-pointer">
        <a href="#" class="py-3 px-4 flex items-center rounded-lg text-white/90 hover:bg-white/20 hover:text-white transition-all duration-300">
          <i class="fas fa-credit-card w-5 mr-3"></i>
          Payments
        </a>
      </li>
      <li class="py-2 text-xs uppercase tracking-wider text-white/60 font-bold mt-6 mb-2">REPORTS</li>
      <li class="cursor-pointer">
        <a href="#" class="py-3 px-4 flex items-center rounded-lg text-white/90 hover:bg-white/20 hover:text-white transition-all duration-300">
          <i class="fas fa-chart-bar w-5 mr-3"></i>
          Reports
        </a>
      </li>
      <li class="py-2 text-xs uppercase tracking-wider text-white/60 font-bold mt-6 mb-2">
        Account
      </li>

      <li class="cursor-pointer">
      <a href="{{ route('profile.edit') }}" class="py-3 px-4 flex items-center rounded-lg text-white/90 hover:bg-white/20 hover:text-white transition-all duration-300">
          <i class="fas fa-user w-5 mr-3"></i>
          Profile
        </a>
      </li>

      <li class="cursor-pointer">
        <a href="{{ route('logout') }}" 
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
          class="py-3 px-4 flex items-center rounded-lg text-red-300 hover:bg-red-500/20 hover:text-red-200 transition-all duration-300">
          <i class="fas fa-sign-out-alt w-5 mr-3"></i>
          Logout
        </a>
      </li>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
      </form>


    </ul>
  </nav>
</aside>