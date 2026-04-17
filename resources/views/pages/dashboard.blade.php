@extends('layouts.app')

@section('content')
  <!-- Stats Cards -->
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 animate-fade-in">
    <!-- Uptime Card -->
    <div class="glass-card rounded-xl p-4 sm:p-5 transition-all duration-300">
      <div class="flex items-center justify-between mb-3">
        <div class="w-9 h-9 sm:w-10 sm:h-10 bg-green-500/20 rounded-lg flex items-center justify-center">
          <iconify-icon icon="mdi:check-circle" class="text-lg sm:text-xl text-green-400"></iconify-icon>
        </div>
        <span class="text-xs text-green-400 bg-green-500/20 px-2 py-1 rounded-full">
            {{ $online_count }}/{{ $total_count }} Online
        </span>
      </div>
      <p class="text-xl sm:text-2xl lg:text-3xl font-semibold text-white">
          {{ $total_count > 0 ? round(($online_count / $total_count) * 100, 1) : 0 }}%
      </p>
      <p class="text-xs sm:text-sm text-neutral-400 mt-1">Uptime Status</p>
    </div>

    <!-- Downtime Card -->
    <div class="glass-card rounded-xl p-4 sm:p-5 transition-all duration-300">
      <div class="flex items-center justify-between mb-3">
        <div class="w-9 h-9 sm:w-10 sm:h-10 bg-red-500/20 rounded-lg flex items-center justify-center">
          <iconify-icon icon="mdi:clock-alert" class="text-lg sm:text-xl text-red-400"></iconify-icon>
        </div>
        <span class="text-xs text-red-400 bg-red-500/20 px-2 py-1 rounded-full">-{{ $total_count - $online_count }} Sites</span>
      </div>
      <p class="text-xl sm:text-2xl lg:text-3xl font-semibold text-white">{{ $total_count - $online_count }}<span
          class="text-base lg:text-lg text-neutral-400"> offline</span></p>
      <p class="text-xs sm:text-sm text-neutral-400 mt-1">Current Incidents</p>
    </div>

    <!-- Attacks Blocked Card -->
    <div class="glass-card rounded-xl p-4 sm:p-5 transition-all duration-300">
      <div class="flex items-center justify-between mb-3">
        <div class="w-9 h-9 sm:w-10 sm:h-10 bg-orange-500/20 rounded-lg flex items-center justify-center">
          <iconify-icon icon="mdi:shield-bug" class="text-lg sm:text-xl text-orange-400"></iconify-icon>
        </div>
        <span class="text-xs text-orange-400 bg-orange-500/20 px-2 py-1 rounded-full">+{{ rand(50, 150) }}</span>
      </div>
      <p class="text-xl sm:text-2xl lg:text-3xl font-semibold text-white">{{ number_format($wp_data['total_attacks']) }}</p>
      <p class="text-xs sm:text-sm text-neutral-400 mt-1">Total Attacks</p>
    </div>

    <!-- Response Time Card -->
    <div class="glass-card rounded-xl p-4 sm:p-5 transition-all duration-300">
      <div class="flex items-center justify-between mb-3">
        <div class="w-9 h-9 sm:w-10 sm:h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
          <iconify-icon icon="mdi:speedometer" class="text-lg sm:text-xl text-blue-400"></iconify-icon>
        </div>
        <span class="text-xs text-blue-400 bg-blue-500/20 px-2 py-1 rounded-full">Avg Latency</span>
      </div>
      <p class="text-xl sm:text-2xl lg:text-3xl font-semibold text-white">{{ $avg_response }}<span
          class="text-base lg:text-lg text-neutral-400">ms</span></p>
      <p class="text-xs sm:text-sm text-neutral-400 mt-1">Avg Response</p>
    </div>
  </div>

  <!-- Websites Status -->
  <div class="animate-fade-in delay-100 mt-8">
    <div class="flex items-center justify-between mb-4">
      <h3 class="font-oswald text-lg sm:text-xl font-medium uppercase tracking-wide">Website Status</h3>
      <a href="{{ route('website.index') }}" class="text-sm text-orange-400 hover:text-orange-300 transition-colors">View All Sites</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
      @foreach($sites as $site)
      <div class="glass-card rounded-xl overflow-hidden transition-all duration-300 border border-white/5 hover:border-orange-500/30">
        <div class="p-4 sm:p-5">
          <div class="flex items-start justify-between mb-4">
            <div class="flex items-center gap-3">
              <div
                class="w-10 h-10 bg-white/10 rounded-lg flex items-center justify-center flex-shrink-0">
                <iconify-icon icon="mdi:wordpress" class="text-xl text-blue-400"></iconify-icon>
              </div>
              <div class="min-w-0">
                <h4 class="font-semibold text-white truncate text-sm">{{ $site['name'] }}</h4>
                <p class="text-[10px] text-neutral-400 truncate">{{ str_replace(['https://', 'http://'], '', $site['url']) }}</p>
              </div>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
              <span class="w-2 h-2 {{ $site['status'] == 'UP' ? 'bg-green-400 pulse-green' : 'bg-red-400 pulse-red' }} rounded-full"></span>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-2 mb-4">
            <div class="bg-white/5 rounded-lg p-2 text-center">
              <p class="text-sm font-semibold text-white">{{ $site['response_time'] }}ms</p>
              <p class="text-[10px] text-neutral-400">Response</p>
            </div>
            <div class="bg-white/5 rounded-lg p-2 text-center">
              <p class="text-sm font-semibold text-white">{{ $site['posts_count'] }}</p>
              <p class="text-[10px] text-neutral-400">Posts</p>
            </div>
          </div>

          <div class="flex items-center justify-between text-[10px] text-neutral-400 border-t border-white/5 pt-3">
            <span>{{ $site['last_check'] }}</span>
            <a href="{{ $site['url'] }}" target="_blank" class="text-orange-400 hover:text-orange-300">Visit →</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Charts & Logs Section -->
  <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 sm:gap-6 animate-fade-in delay-200 mt-8">
    <!-- Uptime Chart -->
    <div class="glass-card rounded-xl p-4 sm:p-5 transition-all duration-300">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-4 gap-2">
        <h3 class="font-oswald text-base sm:text-lg font-medium uppercase tracking-wide">Uptime Overview</h3>
        <select class="bg-white/5 border border-white/10 rounded-lg px-3 py-1 text-sm text-neutral-300 outline-none">
          <option>Last 7 Days</option>
          <option>Last 30 Days</option>
          <option>Last 90 Days</option>
        </select>
      </div>

      <!-- Simple Chart Visualization -->
      <div class="flex items-end gap-1 sm:gap-2 h-32 sm:h-40 mb-4">
        @php $days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']; @endphp
        @foreach($days as $day)
        <div class="flex-1 flex flex-col items-center gap-1">
          <div class="w-full bg-green-500/80 rounded-t hover:bg-green-500 transition-colors cursor-pointer"
            style="height: {{ rand(85, 100) }}%"></div>
          <span class="text-[10px] text-neutral-400">{{ $day }}</span>
        </div>
        @endforeach
      </div>

      <div class="flex items-center justify-center gap-4 text-xs font-medium">
        <div class="flex items-center gap-2">
          <span class="w-3 h-3 bg-green-500 rounded"></span>
          <span class="text-neutral-400">Online</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="w-3 h-3 bg-yellow-500 rounded"></span>
          <span class="text-neutral-400">Slow</span>
        </div>
        <div class="flex items-center gap-2">
          <span class="w-3 h-3 bg-red-500 rounded"></span>
          <span class="text-neutral-400">Down</span>
        </div>
      </div>
    </div>

    <!-- Recent Activity -->
    <div class="glass-card rounded-xl p-4 sm:p-5 transition-all duration-300">
      <div class="flex items-center justify-between mb-4">
        <h3 class="font-oswald text-base sm:text-lg font-medium uppercase tracking-wide">Security Summary</h3>
        <span class="text-xs text-green-400 bg-green-500/10 px-2 py-1 rounded">All Secure</span>
      </div>

      <div class="space-y-3">
          <div class="flex items-center gap-3 p-3 bg-white/5 rounded-lg border border-white/5">
              <div class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center">
                  <iconify-icon icon="mdi:shield-check" class="text-blue-400 text-xl"></iconify-icon>
              </div>
              <div class="flex-1">
                  <p class="text-sm font-medium text-white">Full Security Scan</p>
                  <p class="text-xs text-neutral-400">Completed for {{ $total_count }} websites</p>
              </div>
              <span class="text-[10px] text-neutral-500">10m ago</span>
          </div>

          <div class="flex items-center gap-3 p-3 bg-white/5 rounded-lg border border-white/5">
            <div class="w-10 h-10 rounded-lg bg-orange-500/20 flex items-center justify-center">
                <iconify-icon icon="mdi:update" class="text-orange-400 text-xl"></iconify-icon>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-white">Version Check</p>
                <p class="text-xs text-neutral-400">{{ $wp_data['plugins_updates'] }} updates available across network</p>
            </div>
            <span class="text-[10px] text-neutral-500">1h ago</span>
        </div>

        <div class="flex items-center gap-3 p-3 bg-white/5 rounded-lg border border-white/5">
            <div class="w-10 h-10 rounded-lg bg-purple-500/20 flex items-center justify-center">
                <iconify-icon icon="mdi:account-group" class="text-purple-400 text-xl"></iconify-icon>
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-white">Traffic Analysis</p>
                <p class="text-xs text-neutral-400">~{{ number_format($wp_data['total_visitors'] / 24) }} visits/hour average</p>
            </div>
            <span class="text-[10px] text-neutral-500">2h ago</span>
        </div>
      </div>
    </div>
  </div>
@endsection
