 <!-- Sidebar - Fixed Full Height -->
 <aside id="sidebar"
   class="fixed top-0 left-0 z-50 h-screen w-64 bg-[#0A0A0A] border-r border-white/10 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 flex flex-col">
   <!-- Logo - Fixed at Top -->
   <div class="flex-shrink-0 p-6 border-b border-white/10">
     <div class="flex items-center gap-3">
       <div
         class="w-10 h-10 bg-gradient-to-br from-orange-400 to-orange-600 rounded-lg flex items-center justify-center">
         <iconify-icon icon="mdi:wordpress" class="text-xl text-white"></iconify-icon>
       </div>
       <div>
         <h1 class="font-oswald font-semibold text-lg uppercase tracking-wide">WP Monitor</h1>
         <p class="text-xs text-neutral-400">Security Dashboard</p>
       </div>
     </div>
   </div>

   <!-- Navigation - Scrollable -->
   <nav class="flex-1 overflow-y-auto sidebar-scroll p-4 space-y-1">
      <a href="{{ route('dashboard') }}"
        class="flex items-center gap-3 px-4 py-3 {{ Route::is('dashboard') ? 'bg-orange-500/20 text-orange-400 border border-orange-500/30' : 'text-neutral-400 hover:text-white hover:bg-white/5' }} rounded-lg transition-all">
        <iconify-icon icon="mdi:view-dashboard" class="text-xl"></iconify-icon>
        <span class="font-medium">Dashboard</span>
      </a>
      <a href="{{ route('website.index') }}"
        class="flex items-center gap-3 px-4 py-3 {{ Route::is('website.*') ? 'bg-orange-500/20 text-orange-400 border border-orange-500/30' : 'text-neutral-400 hover:text-white hover:bg-white/5' }} rounded-lg transition-all">
        <iconify-icon icon="mdi:web" class="text-xl"></iconify-icon>
        <span class="font-medium">Website</span>
      </a>
      <a href="{{ route('analytics') }}"
        class="flex items-center gap-3 px-4 py-3 {{ Route::is('analytics') ? 'bg-orange-500/20 text-orange-400 border border-orange-500/30' : 'text-neutral-400 hover:text-white hover:bg-white/5' }} rounded-lg transition-all">
        <iconify-icon icon="mdi:chart-line" class="text-xl"></iconify-icon>
        <span class="font-medium">Analytics</span>
      </a>
      <a href="{{ route('security') }}"
        class="flex items-center gap-3 px-4 py-3 {{ Route::is('security') ? 'bg-orange-500/20 text-orange-400 border border-orange-500/30' : 'text-neutral-400 hover:text-white hover:bg-white/5' }} rounded-lg transition-all">
        <iconify-icon icon="mdi:shield-check" class="text-xl"></iconify-icon>
        <span class="font-medium">Security</span>
      </a>
      <a href="{{ route('logs') }}"
        class="flex items-center gap-3 px-4 py-3 {{ Route::is('logs') ? 'bg-orange-500/20 text-orange-400 border border-orange-500/30' : 'text-neutral-400 hover:text-white hover:bg-white/5' }} rounded-lg transition-all">
        <iconify-icon icon="mdi:file-document" class="text-xl"></iconify-icon>
        <span class="font-medium">Logs</span>
      </a>
      <a href="{{ route('alerts') }}"
        class="flex items-center gap-3 px-4 py-3 {{ Route::is('alerts') ? 'bg-orange-500/20 text-orange-400 border border-orange-500/30' : 'text-neutral-400 hover:text-white hover:bg-white/5' }} rounded-lg transition-all">
        <iconify-icon icon="mdi:bell" class="text-xl"></iconify-icon>
        <span class="font-medium">Alerts</span>
      </a>
      <a href="{{ route('settings') }}"
        class="flex items-center gap-3 px-4 py-3 {{ Route::is('settings') ? 'bg-orange-500/20 text-orange-400 border border-orange-500/30' : 'text-neutral-400 hover:text-white hover:bg-white/5' }} rounded-lg transition-all">
        <iconify-icon icon="mdi:cog" class="text-xl"></iconify-icon>
        <span class="font-medium">Settings</span>
      </a>

     <!-- Extra menu items for scroll demo -->
     <div class="pt-4 border-t border-white/10 mt-4">
       <p class="px-4 text-xs text-neutral-500 uppercase tracking-wide mb-2">Quick Links</p>
       <a href="#"
         class="flex items-center gap-3 px-4 py-3 text-neutral-400 hover:text-white hover:bg-white/5 rounded-lg transition-all">
         <iconify-icon icon="mdi:help-circle" class="text-xl"></iconify-icon>
         <span class="font-medium">Help Center</span>
       </a>
       <a href="#"
         class="flex items-center gap-3 px-4 py-3 text-neutral-400 hover:text-white hover:bg-white/5 rounded-lg transition-all">
         <iconify-icon icon="mdi:book-open" class="text-xl"></iconify-icon>
         <span class="font-medium">Documentation</span>
       </a>
       <a href="#"
         class="flex items-center gap-3 px-4 py-3 text-neutral-400 hover:text-white hover:bg-white/5 rounded-lg transition-all">
         <iconify-icon icon="mdi:message-text" class="text-xl"></iconify-icon>
         <span class="font-medium">Support</span>
       </a>
     </div>
   </nav>

   <!-- User Profile - Fixed at Bottom -->
   <div class="flex-shrink-0 p-4 border-t border-white/10 bg-[#0A0A0A]">
     <div class="flex items-center gap-3">
       <img src="https://picsum.photos/seed/admin-user/100/100.jpg" alt="User"
         class="w-10 h-10 rounded-full object-cover">
       <div class="flex-1 min-w-0">
         <p class="font-medium text-sm truncate">Admin User</p>
         <p class="text-xs text-neutral-400 truncate">admin@website.com</p>
       </div>
       <button class="text-neutral-400 hover:text-white transition-colors">
         <iconify-icon icon="mdi:logout" class="text-xl"></iconify-icon>
       </button>
     </div>
   </div>
 </aside>

 <!-- Sidebar Overlay - Mobile -->
 <div id="sidebar-overlay" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 lg:hidden hidden"
   onclick="toggleSidebar()"></div>
