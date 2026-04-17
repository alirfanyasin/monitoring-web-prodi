@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 animate-fade-in">
        <div>
            <h2 class="font-oswald text-2xl font-semibold uppercase tracking-wide text-white">Website Management</h2>
            <p class="text-neutral-400 text-sm mt-1">Monitor and manage all your WordPress instances from one place.</p>
        </div>
    </div>

    <!-- Website List -->
    <div class="grid grid-cols-1 gap-4 animate-fade-in delay-100">
        @foreach($websites as $key => $website)
        <div class="glass-card rounded-xl overflow-hidden border border-white/5 hover:border-orange-500/30 transition-all duration-300">
            <div class="p-5 sm:p-6">
                <div class="flex flex-col lg:flex-row lg:items-center gap-6">
                    <!-- Site Info -->
                    <div class="flex items-center gap-4 flex-1">
                        <div class="w-14 h-14 bg-white/10 rounded-xl flex items-center justify-center flex-shrink-0">
                            <iconify-icon icon="mdi:wordpress" class="text-3xl text-blue-400"></iconify-icon>
                        </div>
                        <div class="min-w-0">
                            <h3 class="text-lg font-semibold text-white truncate">{{ $website['name'] }}</h3>
                            <p class="text-sm text-neutral-400 flex items-center gap-1">
                                <iconify-icon icon="mdi:link-variant"></iconify-icon>
                                <a href="{{ $website['url'] }}" target="_blank" class="hover:text-orange-400 transition-colors">{{ str_replace(['https://', 'http://'], '', $website['url']) }}</a>
                            </p>
                        </div>
                    </div>

                    <!-- Metrics -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 lg:gap-8 flex-shrink-0">
                        <div class="space-y-1">
                            <p class="text-xs text-neutral-500 uppercase font-medium">Status</p>
                            <div class="flex items-center gap-2">
                                <span class="w-2 h-2 {{ $website['status'] == 'UP' ? 'bg-green-400 pulse-green' : 'bg-red-400 pulse-red' }} rounded-full"></span>
                                <span class="text-sm font-medium {{ $website['status'] == 'UP' ? 'text-green-400' : 'text-red-400' }}">{{ $website['status'] }}</span>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <p class="text-xs text-neutral-500 uppercase font-medium">Response</p>
                            <p class="text-sm font-semibold text-white">{{ $website['response_time'] }}ms</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-xs text-neutral-500 uppercase font-medium">Platform</p>
                            <p class="text-sm font-semibold text-white">{{ $website['platform'] }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-xs text-neutral-500 uppercase font-medium">Last Check</p>
                            <p class="text-sm font-semibold text-white">{{ $website['last_check'] }}</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-2 lg:ml-4">
                        <a href="{{ route('website.show', $key) }}" class="p-2 bg-white/5 border border-white/10 rounded-lg text-neutral-400 hover:text-white hover:bg-white/10 transition-all" title="Site Dashboard">
                            <iconify-icon icon="mdi:view-dashboard-outline" class="text-xl"></iconify-icon>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
