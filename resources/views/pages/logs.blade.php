@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="animate-fade-in flex justify-between items-end">
        <div>
            <h2 class="font-oswald text-2xl font-semibold uppercase tracking-wide text-white">System Logs</h2>
            <p class="text-neutral-400 text-sm mt-1">Real-time activity audit across all monitored instances.</p>
        </div>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-white/5 border border-white/10 rounded-lg text-sm text-white hover:bg-white/10 transition-all">Export CSV</button>
            <button class="px-4 py-2 bg-orange-500 text-white rounded-lg text-sm font-medium">Clear History</button>
        </div>
    </div>

    <div class="glass-card rounded-xl overflow-hidden animate-fade-in delay-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-white/5 text-[10px] text-neutral-400 uppercase tracking-widest">
                    <tr>
                        <th class="px-6 py-4">Timestamp</th>
                        <th class="px-6 py-4">Source</th>
                        <th class="px-6 py-4">Event</th>
                        <th class="px-6 py-4">Details</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-sm">
                    @foreach(range(1, 10) as $i)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4 text-neutral-400">{{ now()->subMinutes($i * 5)->format('Y-m-d H:i:s') }}</td>
                        <td class="px-6 py-4 text-white font-medium">Site-{{ $i }}.com</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-0.5 rounded text-[10px] {{ $i % 3 == 0 ? 'bg-red-500/20 text-red-400' : 'bg-green-500/20 text-green-400' }}">
                                {{ $i % 3 == 0 ? 'ERROR' : 'INFO' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-neutral-300">{{ $i % 3 == 0 ? 'Database connection timeout' : 'Scheduled health check completed' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
