@extends('layouts.app')

@section('content')
  <div class="space-y-6">
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-xs text-neutral-500 animate-fade-in">
      <a href="{{ route('website.index') }}" class="hover:text-white transition-colors">Websites</a>
      <iconify-icon icon="mdi:chevron-right"></iconify-icon>
      <span class="text-white font-medium">{{ $website['name'] }}</span>
    </div>

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 animate-fade-in delay-100">
      <div class="flex items-center gap-4">
        <div
          class="w-16 h-16 bg-gradient-to-br from-blue-500/20 to-blue-600/20 rounded-2xl flex items-center justify-center border border-blue-500/20 shadow-lg shadow-blue-500/10">
          <iconify-icon icon="mdi:wordpress" class="text-4xl text-blue-400"></iconify-icon>
        </div>
        <div>
          <h2 class="text-2xl font-bold text-white tracking-tight">{{ $website['name'] }}</h2>
          <a href="{{ $website['url'] }}" target="_blank"
            class="text-neutral-400 hover:text-orange-400 transition-colors flex items-center gap-1 text-sm mt-1 font-medium">
            {{ str_replace(['https://', 'http://', '/'], '', $website['url']) }}
            <iconify-icon icon="mdi:open-in-new" class="text-xs"></iconify-icon>
          </a>
        </div>
      </div>
      <div class="flex items-center gap-3">
        <div class="flex flex-col items-end">
          <span
            class="px-3 py-1 bg-green-500/10 text-green-400 border border-green-500/20 rounded-full text-xs font-semibold flex items-center gap-1.5 uppercase tracking-wider">
            <span
              class="w-1.5 h-1.5 bg-green-400 rounded-full {{ $metrics['uptime'] == 'UP' ? 'animate-pulse' : '' }}"></span>
            {{ $metrics['uptime'] == 'UP' ? 'Operational' : 'Critical' }}
          </span>
          <span class="text-[10px] text-neutral-500 mt-1 uppercase tracking-widest font-bold">Status Code:
            {{ $metrics['status_code'] }}</span>
        </div>
      </div>
    </div>

    <!-- Summary Metrics Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 animate-fade-in delay-150">
      <div class="glass-card rounded-2xl p-4 border border-white/5 flex items-center gap-4">
        <div class="w-10 h-10 bg-blue-500/10 rounded-xl flex items-center justify-center text-blue-400">
          <iconify-icon icon="mdi:post" class="text-2xl"></iconify-icon>
        </div>
        <div>
          <p class="text-[10px] text-neutral-500 uppercase font-black tracking-widest">Total Post</p>
          <p class="text-xl font-black text-white leading-none mt-1">{{ number_format($metrics['total_posts']) }}</p>
        </div>
      </div>
      <div class="glass-card rounded-2xl p-4 border border-white/5 flex items-center gap-4">
        <div class="w-10 h-10 bg-orange-500/10 rounded-xl flex items-center justify-center text-orange-400">
          <iconify-icon icon="mdi:file-multiple" class="text-2xl"></iconify-icon>
        </div>
        <div>
          <p class="text-[10px] text-neutral-500 uppercase font-black tracking-widest">Total Page</p>
          <p class="text-xl font-black text-white leading-none mt-1">{{ number_format($metrics['total_pages'] ?? 0) }}</p>
        </div>
      </div>
      <div class="glass-card rounded-2xl p-4 border border-white/5 flex items-center gap-4">
        <div class="w-10 h-10 bg-green-500/10 rounded-xl flex items-center justify-center text-green-400">
          <iconify-icon icon="mdi:calendar-check" class="text-2xl"></iconify-icon>
        </div>
        <div>
          <p class="text-[10px] text-neutral-500 uppercase font-black tracking-widest">Post (Month)</p>
          <p class="text-xl font-black text-white leading-none mt-1">{{ number_format($metrics['posts_this_month']) }}
          </p>
        </div>
      </div>
      <div class="glass-card rounded-2xl p-4 border border-white/5 flex items-center gap-4">
        <div class="w-10 h-10 bg-purple-500/10 rounded-xl flex items-center justify-center text-purple-400">
          <iconify-icon icon="mdi:account-group" class="text-2xl"></iconify-icon>
        </div>
        <div>
          <p class="text-[10px] text-neutral-500 uppercase font-black tracking-widest">Total User</p>
          <p class="text-xl font-black text-white leading-none mt-1">{{ number_format($metrics['total_users'] ?? 0) }}
          </p>
        </div>
      </div>
    </div>

    <!-- Health & Performance Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 animate-fade-in delay-200">
      <!-- Performance Health Metrics -->
      <div class="glass-card rounded-3xl p-6 relative overflow-hidden group">
        <div class="absolute -top-6 -right-6 opacity-5 group-hover:opacity-10 transition-opacity">
          <iconify-icon icon="mdi:heart-pulse" class="text-9xl text-white"></iconify-icon>
        </div>
        <h3 class="text-white font-black text-sm uppercase tracking-widest mb-6 flex items-center gap-2">
          <iconify-icon icon="mdi:speedometer-slow" class="text-orange-500"></iconify-icon>
          Performance Health
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
          <div class="space-y-2">
            <p class="text-neutral-500 text-[10px] font-black uppercase tracking-widest">Load Time</p>
            <p class="text-3xl font-black text-white">0.82<span class="text-sm font-normal text-neutral-400 ml-1">s</span>
            </p>
            <div class="w-full bg-white/5 rounded-full h-1">
              <div class="bg-green-500 h-1 rounded-full" style="width: 85%"></div>
            </div>
          </div>
          <div class="space-y-2">
            <p class="text-neutral-500 text-[10px] font-black uppercase tracking-widest">Page Size</p>
            <p class="text-3xl font-black text-white">1.2<span class="text-sm font-normal text-neutral-400 ml-1">MB</span>
            </p>
            <div class="w-full bg-white/5 rounded-full h-1">
              <div class="bg-blue-500 h-1 rounded-full" style="width: 70%"></div>
            </div>
          </div>
          <div class="space-y-2">
            <p class="text-neutral-500 text-[10px] font-black uppercase tracking-widest">Uptime Rate</p>
            <p class="text-3xl font-black text-white">99.98<span
                class="text-sm font-normal text-neutral-400 ml-1">%</span></p>
            <div class="w-full bg-white/5 rounded-full h-1">
              <div class="bg-orange-500 h-1 rounded-full" style="width: 95%"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Uptime Stats card -->
      <div class="lg:col-span-2 glass-card rounded-3xl p-6 relative overflow-hidden">
        <div class="flex items-center justify-between mb-8">
          <h3 class="text-white font-black text-sm uppercase tracking-widest flex items-center gap-2">
            <iconify-icon icon="mdi:pulse" class="text-green-500"></iconify-icon>
            Network Availability (30 Days)
          </h3>
          <span class="text-[10px] text-green-400 font-black uppercase bg-green-500/10 px-2 py-1 rounded">Stable
            Connection</span>
        </div>

        <div class="flex gap-1 h-12 items-end mb-4">
          @foreach (range(1, 45) as $i)
            <div class="flex-1 h-{{ rand(6, 12) }} {{ $i == 30 ? 'bg-orange-500' : 'bg-green-500/40' }} rounded-sm"
              title="Day {{ $i }}: 100%"></div>
          @endforeach
        </div>
        <div class="flex justify-between items-center text-[10px] text-neutral-500 font-bold uppercase">
          <span>Total Downtime: <span class="text-white">12m this year</span></span>
          <span>Last Incident: <span class="text-white">15 days ago</span></span>
        </div>
      </div>
    </div>

    <!-- Detailed Content Sections -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 animate-fade-in delay-200">
      <div class="lg:col-span-2 space-y-6">


        <!-- 5 Latest Page Changes -->
        <div class="glass-card rounded-3xl p-6">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-white font-black text-sm uppercase tracking-widest flex items-center gap-2">
              <iconify-icon icon="mdi:history" class="text-blue-500"></iconify-icon>
              Page Activity Audit (Last 5 Changes)
            </h3>
          </div>
          <div class="space-y-4">
            @forelse($metrics['latest_changes'] as $change)
              <div
                class="flex items-center gap-4 p-4 bg-white/5 rounded-2xl border border-white/5 hover:border-blue-500/30 transition-all group">
                <div
                  class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center text-blue-400 group-hover:scale-110 transition-transform">
                  <iconify-icon icon="mdi:file-document-edit-outline" class="text-2xl"></iconify-icon>
                </div>
                <div class="flex-1 min-w-0">
                  <p class="text-sm font-bold text-white truncate">{!! $change['title'] !!}</p>
                  <div class="flex items-center gap-3 mt-1">
                    <span class="text-[10px] font-bold text-blue-400 uppercase flex items-center gap-1">
                      <iconify-icon icon="mdi:account"></iconify-icon>
                      {{ $change['author'] }}
                    </span>
                    <span class="text-[10px] text-neutral-500">{{ $change['date'] }}</span>
                  </div>
                </div>
                <span
                  class="px-2 py-1 bg-blue-500/20 text-blue-400 text-[9px] rounded-lg font-black uppercase tracking-tighter">Modified</span>
              </div>
            @empty
              <div class="text-center py-6">
                <iconify-icon icon="mdi:file-search" class="text-4xl text-neutral-700"></iconify-icon>
                <p class="text-neutral-500 text-xs mt-2 italic">No page data found via API.</p>
              </div>
            @endforelse
          </div>
        </div>
      </div>

      <!-- Sidebar Metrics -->
      <div class="space-y-6">
        <!-- Security Audit Stream -->
        <div
          class="glass-card rounded-3xl p-6 border-t-4 border-red-500/40 bg-gradient-to-b from-red-500/5 to-transparent">
          <h3 class="text-white font-black text-sm uppercase tracking-widest flex items-center gap-2 mb-6">
            <iconify-icon icon="mdi:shield-bug" class="text-red-500"></iconify-icon>
            Live Attack Log
          </h3>
          <div class="space-y-4">
            @foreach ($metrics['attacks']['logs'] as $log)
              <div class="flex items-start gap-3 p-3 bg-white/5 rounded-2xl border border-white/5">
                <div
                  class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center flex-shrink-0 text-red-500">
                  <iconify-icon icon="mdi:shield-off-outline" class="text-sm"></iconify-icon>
                </div>
                <div class="flex-1 min-w-0">
                  <p class="text-[11px] font-bold text-white">{{ $log['event'] }}</p>
                  <p class="text-[9px] text-neutral-500 font-mono mt-0.5">{{ $log['ip'] }}</p>
                </div>
                <span class="text-[8px] text-red-400/50 font-black uppercase">{{ $log['time'] }}</span>
              </div>
            @endforeach
          </div>
          <button
            class="w-full mt-6 py-2.5 bg-white/5 hover:bg-white/10 rounded-xl text-[9px] font-black text-neutral-500 uppercase tracking-[0.2em] transition-all border border-white/5">
            Clear Logs
          </button>
        </div>

        <!-- Global Visitors (WP Statistics) -->
        <div
          class="glass-card rounded-3xl p-6 bg-gradient-to-br from-blue-600/10 to-transparent border-b-4 border-blue-500/30">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-white font-black text-sm uppercase tracking-widest flex items-center gap-2">
              <iconify-icon icon="mdi:chart-donut" class="text-blue-400"></iconify-icon>
              Visitors Stats
            </h3>
            <iconify-icon icon="mdi:information-outline" class="text-neutral-600 cursor-help"
              title="Data from WP Statistics Plugin"></iconify-icon>
          </div>
          <div class="text-center">
            <p class="text-4xl font-black text-white leading-none">{{ number_format($metrics['visitors']) }}</p>
            <p class="text-[10px] text-neutral-500 uppercase font-black tracking-widest mt-1">Total Hits Recorded</p>
          </div>
          <div class="mt-6 space-y-2">
            <div class="flex justify-between text-[10px]">
              <span class="text-neutral-500 uppercase">Growth Rate</span>
              <span class="text-green-400 font-bold">+12.5%</span>
            </div>
            <div class="w-full bg-white/5 h-1.5 rounded-full overflow-hidden">
              <div class="bg-blue-400 h-full rounded-full" style="width: 65%"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
