<!-- Header - Sticky -->
<header class="sticky top-0 z-30 bg-black/80 backdrop-blur-xl border-b border-white/10">
  <div class="flex items-center justify-between px-4 lg:px-8 py-4">
    <!-- Mobile Menu Button -->
    <button onclick="toggleSidebar()" class="lg:hidden text-white p-2 hover:bg-white/10 rounded-lg transition-colors">
      <iconify-icon icon="mdi:menu" class="text-2xl"></iconify-icon>
    </button>

    <div class="hidden lg:block"></div>

    <!-- Mobile Title -->
    <div class="lg:hidden">
      <h2 class="font-oswald text-lg font-medium uppercase tracking-wide">Dashboard</h2>
    </div>

    <!-- Search & Actions -->
    <div class="flex items-center gap-2 sm:gap-3">
      <!-- Search -->
      {{-- <div class="hidden md:flex items-center bg-white/5 border border-white/10 rounded-lg px-3 py-2">
        <iconify-icon icon="mdi:magnify" class="text-neutral-400 mr-2"></iconify-icon>
        <input type="text" placeholder="Search..."
          class="bg-transparent text-sm outline-none w-32 lg:w-40 placeholder-neutral-500">
      </div> --}}

      <!-- Notifications -->
      <button class="relative p-2 text-neutral-400 hover:text-white hover:bg-white/10 rounded-lg transition-all">
        <iconify-icon icon="mdi:bell" class="text-xl"></iconify-icon>
        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
      </button>
    </div>
  </div>
</header>
