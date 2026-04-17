<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WordPress Monitor Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Oswald:wght@400;500;600;700&display=swap"
    rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'inter': ['Inter', 'sans-serif'],
            'oswald': ['Oswald', 'sans-serif'],
          }
        }
      }
    }
  </script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #000000;
    }

    .font-oswald {
      font-family: 'Oswald', sans-serif;
    }

    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(20px);
        filter: blur(5px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
        filter: blur(0);
      }
    }

    .animate-fade-in {
      animation: fadeInUp 0.6s ease-out forwards;
    }

    .delay-100 {
      animation-delay: 100ms;
    }

    .delay-200 {
      animation-delay: 200ms;
    }

    .delay-300 {
      animation-delay: 300ms;
    }

    .delay-400 {
      animation-delay: 400ms;
    }

    @keyframes pulse-green {

      0%,
      100% {
        box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.4);
      }

      50% {
        box-shadow: 0 0 0 8px rgba(34, 197, 94, 0);
      }
    }

    .pulse-green {
      animation: pulse-green 2s infinite;
    }

    @keyframes pulse-red {

      0%,
      100% {
        box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4);
      }

      50% {
        box-shadow: 0 0 0 8px rgba(239, 68, 68, 0);
      }
    }

    .pulse-red {
      animation: pulse-red 2s infinite;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.03);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .glass-card:hover {
      background: rgba(255, 255, 255, 0.06);
      border-color: rgba(249, 115, 22, 0.3);
    }

    .gradient-border {
      background: linear-gradient(180deg, rgba(251, 146, 60, 0.5) 0%, rgba(251, 146, 60, 0) 100%);
    }

    .scrollbar-thin::-webkit-scrollbar {
      width: 6px;
    }

    .scrollbar-thin::-webkit-scrollbar-track {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 3px;
    }

    .scrollbar-thin::-webkit-scrollbar-thumb {
      background: rgba(255, 255, 255, 0.2);
      border-radius: 3px;
    }

    .scrollbar-thin::-webkit-scrollbar-thumb:hover {
      background: rgba(255, 255, 255, 0.3);
    }

    /* Custom scrollbar for sidebar */
    .sidebar-scroll::-webkit-scrollbar {
      width: 4px;
    }

    .sidebar-scroll::-webkit-scrollbar-track {
      background: transparent;
    }

    .sidebar-scroll::-webkit-scrollbar-thumb {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 2px;
    }

    .sidebar-scroll::-webkit-scrollbar-thumb:hover {
      background: rgba(255, 255, 255, 0.2);
    }
  </style>
</head>

<body class="min-h-screen text-white overflow-x-hidden">
  <!-- Background Glow Effects -->
  <div class="fixed inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-orange-500/10 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-green-500/5 rounded-full blur-[100px]"></div>
  </div>

  <div class="relative flex min-h-screen">
    @include('partials.sidebar-app')
    <!-- Main Content Area -->
    <main class="flex-1 lg:ml-64 min-h-screen">
      @include('partials.navbar-app')

      <!-- Content - Scrollable -->
      <div class="p-4 lg:p-8 space-y-6">
        @yield('content')

        @include('partials.footer-app')
      </div>
    </main>
  </div>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('sidebar-overlay');

      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
      document.body.classList.toggle('overflow-hidden');
    }

    // Close sidebar on window resize if desktop
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 1024) {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
      }
    });

    // Close sidebar when clicking a link (mobile)
    document.querySelectorAll('#sidebar nav a').forEach(link => {
      link.addEventListener('click', () => {
        if (window.innerWidth < 1024) {
          toggleSidebar();
        }
      });
    });
  </script>
</body>

</html>
