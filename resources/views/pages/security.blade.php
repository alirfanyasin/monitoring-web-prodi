@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="animate-fade-in flex justify-between items-center">
        <div>
            <h2 class="font-oswald text-2xl font-semibold uppercase tracking-wide text-white">Security Center</h2>
            <p class="text-neutral-400 text-sm mt-1">Network-wide firewall and intrusion detection systems.</p>
        </div>
        <span class="px-3 py-1 bg-green-500/20 text-green-400 text-xs rounded-full border border-green-500/30 flex items-center gap-2">
            <span class="w-2 h-2 bg-green-400 rounded-full pulse-green"></span>
            System Shield Active
        </span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 animate-fade-in delay-100">
        <div class="glass-card rounded-xl p-5 border-l-4 border-red-500">
            <p class="text-neutral-400 text-xs uppercase font-semibold">Blocked Requests</p>
            <p class="text-2xl font-bold text-white mt-1">12,482</p>
            <p class="text-[10px] text-red-400 mt-1">+12% from yesterday</p>
        </div>
        <div class="glass-card rounded-xl p-5 border-l-4 border-yellow-500">
            <p class="text-neutral-400 text-xs uppercase font-semibold">Threat Level</p>
            <p class="text-2xl font-bold text-white mt-1">Low</p>
            <p class="text-[10px] text-yellow-400 mt-1">3 suspicious IPs monitored</p>
        </div>
        <div class="glass-card rounded-xl p-5 border-l-4 border-blue-500">
            <p class="text-neutral-400 text-xs uppercase font-semibold">Firewall Rules</p>
            <p class="text-2xl font-bold text-white mt-1">256</p>
            <p class="text-[10px] text-blue-400 mt-1">Active global rules</p>
        </div>
        <div class="glass-card rounded-xl p-5 border-l-4 border-green-500">
            <p class="text-neutral-400 text-xs uppercase font-semibold">SSL Certificates</p>
            <p class="text-2xl font-bold text-white mt-1">11/11</p>
            <p class="text-[10px] text-green-400 mt-1">All valid & secure</p>
        </div>
    </div>
</div>
@endsection
