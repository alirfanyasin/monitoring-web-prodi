@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-xs text-neutral-500 animate-fade-in">
        <a href="{{ route('website.index') }}" class="hover:text-white transition-colors">Websites</a>
        <iconify-icon icon="mdi:chevron-right"></iconify-icon>
        <a href="{{ route('website.show', $id) }}" class="hover:text-white transition-colors">{{ $website['name'] }}</a>
        <iconify-icon icon="mdi:chevron-right"></iconify-icon>
        <span class="text-white font-medium">Analytics</span>
    </div>

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 animate-fade-in delay-100">
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 bg-gradient-to-br from-orange-500/20 to-orange-600/20 rounded-2xl flex items-center justify-center border border-orange-500/20">
                <iconify-icon icon="mdi:chart-bar" class="text-4xl text-orange-400"></iconify-icon>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-white">{{ $website['name'] }} Analytics</h2>
                <p class="text-neutral-400 text-sm mt-1">Detailed visitor behavior and site performance metrics.</p>
            </div>
        </div>
    </div>

    <!-- Site Specific Tabs/Navigation -->
    <div class="flex items-center gap-1 p-1 bg-white/5 rounded-2xl w-fit animate-fade-in delay-200">
        <a href="{{ route('website.show', $id) }}" class="px-6 py-2 rounded-xl text-sm font-medium transition-all {{ Route::is('website.show') ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/20' : 'text-neutral-400 hover:text-white hover:bg-white/5' }}">Dashboard</a>
        <a href="{{ route('website.analytics', $id) }}" class="px-6 py-2 rounded-xl text-sm font-medium transition-all {{ Route::is('website.analytics') ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/20' : 'text-neutral-400 hover:text-white hover:bg-white/5' }}">Analytics</a>
        <a href="{{ route('website.logs', $id) }}" class="px-6 py-2 rounded-xl text-sm font-medium transition-all {{ Route::is('website.logs') ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/20' : 'text-neutral-400 hover:text-white hover:bg-white/5' }}">Logs</a>
    </div>

    <!-- Analytics Content -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 animate-fade-in delay-300">
        <div class="glass-card rounded-3xl p-6">
            <h3 class="text-white font-semibold mb-6">Traffic Sources</h3>
            <div class="space-y-4">
                @php $sources = ['Organic Search', 'Direct', 'Social Media', 'Referral']; @endphp
                @foreach($sources as $source)
                <div>
                    <div class="flex justify-between text-xs mb-2">
                        <span class="text-neutral-400">{{ $source }}</span>
                        <span class="text-white">{{ rand(10, 50) }}%</span>
                    </div>
                    <div class="w-full bg-white/5 rounded-full h-2">
                        <div class="bg-orange-500 h-2 rounded-full" style="width: {{ rand(10, 50) }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="glass-card rounded-3xl p-6">
            <h3 class="text-white font-semibold mb-6">Real-time Visitors</h3>
            <div class="flex items-center justify-center h-48">
                <div class="text-center">
                    <p class="text-6xl font-bold text-orange-400 animate-pulse">{{ rand(10, 99) }}</p>
                    <p class="text-neutral-500 text-sm mt-2 uppercase tracking-widest font-semibold">Active Now</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
