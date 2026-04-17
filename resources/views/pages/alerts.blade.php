@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="animate-fade-in flex justify-between items-center">
        <div>
            <h2 class="font-oswald text-2xl font-semibold uppercase tracking-wide text-white">Alert Notifications</h2>
            <p class="text-neutral-400 text-sm mt-1">Configure and manage threshold-based system alerts.</p>
        </div>
        <button class="w-10 h-10 bg-white/5 border border-white/10 rounded-full flex items-center justify-center text-white hover:bg-orange-500 transition-all">
            <iconify-icon icon="mdi:bell-plus" class="text-xl"></iconify-icon>
        </button>
    </div>

    <div class="grid grid-cols-1 gap-4 animate-fade-in delay-100">
        <div class="glass-card rounded-xl p-4 flex items-center gap-4 bg-red-500/5 border-l-4 border-red-500">
            <div class="w-10 h-10 bg-red-500/20 rounded-full flex items-center justify-center text-red-500">
                <iconify-icon icon="mdi:alert" class="text-xl"></iconify-icon>
            </div>
            <div class="flex-1">
                <h4 class="text-white font-medium">Critical: Server Offline</h4>
                <p class="text-neutral-400 text-xs">Technical Faculty blog is currently unreachable since 10:45 AM.</p>
            </div>
            <span class="text-[10px] text-neutral-500 font-medium px-2 py-1 bg-white/5 rounded">15m ago</span>
        </div>

        <div class="glass-card rounded-xl p-4 flex items-center gap-4 border-l-4 border-orange-500">
            <div class="w-10 h-10 bg-orange-500/20 rounded-full flex items-center justify-center text-orange-500">
                <iconify-icon icon="mdi:speedometer-slow" class="text-xl"></iconify-icon>
            </div>
            <div class="flex-1">
                <h4 class="text-white font-medium">Warning: High Latency</h4>
                <p class="text-neutral-400 text-xs">Response time exceeded 2000ms on 3 network instances.</p>
            </div>
            <span class="text-[10px] text-neutral-500 font-medium px-2 py-1 bg-white/5 rounded">2h ago</span>
        </div>
    </div>
</div>
@endsection
