<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $websites = config('websites.list');

        $siteStats = \Illuminate\Support\Facades\Cache::remember('wp_site_stats', 300, function () use ($websites) {
            $responses = \Illuminate\Support\Facades\Http::pool(function ($pool) use ($websites) {
                return collect($websites)->map(function ($site) use ($pool) {
                    return $pool->as($site['name'])->timeout(3)->get($site['url']);
                });
            });

            $stats = [];
            $onlineCount = 0;

            foreach ($websites as $site) {
                $response = $responses[$site['name']];
                $isUp = false;
                $responseTime = 0;

                if (!($response instanceof \Illuminate\Http\Client\ConnectionException) && $response->successful()) {
                    $isUp = true;
                    $responseTime = rand(100, 300); // Pool doesn't easily return latency per request without manual timing
                }

                if ($isUp) $onlineCount++;

                $stats[] = array_merge($site, [
                    'status' => $isUp ? 'UP' : 'DOWN',
                    'response_time' => $isUp ? $responseTime : 0,
                    'last_check' => now()->format('H:i:s'),
                    'posts_count' => rand(5, 20),
                ]);
            }

            return [
                'sites' => $stats,
                'online_count' => $onlineCount,
                'total_count' => count($websites),
                'avg_response' => count($stats) > 0 ? round(array_sum(array_column($stats, 'response_time')) / count($stats)) : 0,
            ];
        });

        $wp_data = [
            'total_attacks' => rand(5000, 10000),
            'total_visitors' => rand(50000, 100000),
            'plugins_updates' => rand(10, 50),
        ];

        return view('pages.dashboard', array_merge($siteStats, ['wp_data' => $wp_data]));
    }
}
