@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="animate-fade-in">
        <h2 class="font-oswald text-2xl font-semibold uppercase tracking-wide text-white">System Settings</h2>
        <p class="text-neutral-400 text-sm mt-1">Configure your dashboard preferences and global monitoring parameters.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 animate-fade-in delay-100">
        <div class="glass-card rounded-xl p-6">
            <h3 class="text-white font-medium mb-6 flex items-center gap-2">
                <iconify-icon icon="mdi:cog" class="text-orange-500"></iconify-icon>
                General Configuration
            </h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-white">Automatic Refresh</p>
                        <p class="text-xs text-neutral-400">Update stats every 30 seconds</p>
                    </div>
                    <div class="w-10 h-6 bg-orange-500 rounded-full relative">
                        <div class="absolute right-1 top-1 w-4 h-4 bg-white rounded-full"></div>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-white">Email Notifications</p>
                        <p class="text-xs text-neutral-400">Send alerts for critical failures</p>
                    </div>
                    <div class="w-10 h-6 bg-white/10 rounded-full relative">
                        <div class="absolute left-1 top-1 w-4 h-4 bg-white/40 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-card rounded-xl p-6">
            <h3 class="text-white font-medium mb-6 flex items-center gap-2">
                <iconify-icon icon="mdi:api" class="text-blue-500"></iconify-icon>
                API Access
            </h3>
            <div class="space-y-4">
                <div>
                    <label class="text-xs text-neutral-500 uppercase font-semibold mb-2 block">Endpoint Token</label>
                    <div class="flex gap-2">
                        <input type="password" readonly value="pk_live_51MvS1..." class="flex-1 bg-white/5 border border-white/10 rounded-lg px-3 py-2 text-sm text-white focus:outline-none">
                        <button class="px-3 bg-white/10 rounded-lg text-white hover:bg-white/20 transition-all">Copy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
