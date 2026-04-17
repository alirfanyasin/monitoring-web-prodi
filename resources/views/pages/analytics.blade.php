@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="animate-fade-in">
        <h2 class="font-oswald text-2xl font-semibold uppercase tracking-wide text-white">Advanced Analytics</h2>
        <p class="text-neutral-400 text-sm mt-1">Deep dive into network performance and traffic patterns.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 animate-fade-in delay-100">
        <div class="glass-card rounded-xl p-6 lg:col-span-2">
            <h3 class="text-white font-medium mb-4">Traffic Evolution</h3>
            <div class="h-64 flex items-end gap-2 px-2">
                @foreach(range(1, 24) as $i)
                <div class="flex-1 bg-gradient-to-t from-orange-500/20 to-orange-500/80 rounded-t-sm" style="height: {{ rand(20, 90) }}%"></div>
                @endforeach
            </div>
            <div class="flex justify-between mt-4 text-[10px] text-neutral-500 uppercase">
                <span>00:00</span>
                <span>06:00</span>
                <span>12:00</span>
                <span>18:00</span>
                <span>23:59</span>
            </div>
        </div>

        <div class="glass-card rounded-xl p-6">
            <h3 class="text-white font-medium mb-4">Device Distribution</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-neutral-400">Desktop</span>
                        <span class="text-white">65%</span>
                    </div>
                    <div class="w-full bg-white/5 rounded-full h-1.5">
                        <div class="bg-blue-500 h-1.5 rounded-full" style="width: 65%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-neutral-400">Mobile</span>
                        <span class="text-white">28%</span>
                    </div>
                    <div class="w-full bg-white/5 rounded-full h-1.5">
                        <div class="bg-orange-500 h-1.5 rounded-full" style="width: 28%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-xs mb-1">
                        <span class="text-neutral-400">Tablet</span>
                        <span class="text-white">7%</span>
                    </div>
                    <div class="w-full bg-white/5 rounded-full h-1.5">
                        <div class="bg-purple-500 h-1.5 rounded-full" style="width: 7%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
