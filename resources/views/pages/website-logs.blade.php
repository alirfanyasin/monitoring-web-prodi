@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-xs text-neutral-500 animate-fade-in">
        <a href="{{ route('website.index') }}" class="hover:text-white transition-colors">Websites</a>
        <iconify-icon icon="mdi:chevron-right"></iconify-icon>
        <a href="{{ route('website.show', $id) }}" class="hover:text-white transition-colors">{{ $website['name'] }}</a>
        <iconify-icon icon="mdi:chevron-right"></iconify-icon>
        <span class="text-white font-medium">Security Logs</span>
    </div>

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 animate-fade-in delay-100">
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 bg-gradient-to-br from-red-500/20 to-red-600/20 rounded-2xl flex items-center justify-center border border-red-500/20">
                <iconify-icon icon="mdi:file-document-outline" class="text-4xl text-red-400"></iconify-icon>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-white">{{ $website['name'] }} Logs</h2>
                <p class="text-neutral-400 text-sm mt-1">Audit trail of system events and security incidents.</p>
            </div>
        </div>
    </div>

    <!-- Site Specific Tabs/Navigation -->
    <div class="flex items-center gap-1 p-1 bg-white/5 rounded-2xl w-fit animate-fade-in delay-200">
        <a href="{{ route('website.show', $id) }}" class="px-6 py-2 rounded-xl text-sm font-medium transition-all {{ Route::is('website.show') ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/20' : 'text-neutral-400 hover:text-white hover:bg-white/5' }}">Dashboard</a>
        <a href="{{ route('website.analytics', $id) }}" class="px-6 py-2 rounded-xl text-sm font-medium transition-all {{ Route::is('website.analytics') ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/20' : 'text-neutral-400 hover:text-white hover:bg-white/5' }}">Analytics</a>
        <a href="{{ route('website.logs', $id) }}" class="px-6 py-2 rounded-xl text-sm font-medium transition-all {{ Route::is('website.logs') ? 'bg-orange-500 text-white shadow-lg shadow-orange-500/20' : 'text-neutral-400 hover:text-white hover:bg-white/5' }}">Logs</a>
    </div>

    <!-- Logs Content -->
    <div class="glass-card rounded-3xl overflow-hidden animate-fade-in delay-300">
        <div class="p-6 border-b border-white/5 flex justify-between items-center">
            <h3 class="text-white font-semibold flex items-center gap-2">
                <iconify-icon icon="mdi:shield-bug" class="text-red-500"></iconify-icon>
                Security Audit Trail
            </h3>
            <button class="text-xs text-neutral-500 hover:text-white transition-all">Download Audit Full Log</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-white/5 text-[10px] text-neutral-400 uppercase tracking-widest">
                    <tr>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">IP Address</th>
                        <th class="px-6 py-4">Request URI</th>
                        <th class="px-6 py-4">Action</th>
                        <th class="px-6 py-4">Timestamp</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-sm">
                    @foreach(range(1, 8) as $i)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4">
                            <span class="w-2 h-2 rounded-full {{ $i % 4 == 0 ? 'bg-red-400' : 'bg-green-400' }} inline-block mr-2 shadow-[0_0_8px_rgba(0,0,0,0.4)]"></span>
                            <span class="text-xs {{ $i % 4 == 0 ? 'text-red-400' : 'text-green-400' }}">{{ $i % 4 == 0 ? 'BLOCKED' : 'ALLOWED' }}</span>
                        </td>
                        <td class="px-6 py-4 text-neutral-400 font-mono text-xs">192.168.{{ rand(1, 255) }}.{{ rand(1, 255) }}</td>
                        <td class="px-6 py-4 text-white text-xs">/wp-login.php?action=failed_attempt_{{ $i }}</td>
                        <td class="px-6 py-4 text-neutral-300 italic text-xs">{{ $i % 4 == 0 ? 'SQL Injection attempt detected' : 'Standard GET request' }}</td>
                        <td class="px-6 py-4 text-neutral-500 text-[10px]">{{ now()->subSeconds($i * 120)->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
