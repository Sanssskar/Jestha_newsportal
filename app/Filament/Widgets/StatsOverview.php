<?php

namespace App\Filament\Widgets;

use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends StatsOverviewWidget
{
    // ✅ Correct way - NOT static
    protected ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        $now = Carbon::now();

        $totalCategories = Category::count();
        $totalArticles   = Article::count();
        $totalAdvertises = Advertise::count();

        $todayArticles   = Article::whereDate('created_at', $now->toDateString())->count();
        $todayAdvertises = Advertise::whereDate('created_at', $now->toDateString())->count();

        return [
            Stat::make('Total Categories', $totalCategories)
                ->icon('heroicon-o-folder')
                ->color('info')
                ->description('All categories'),

            Stat::make('Total Articles', $totalArticles)
                ->icon('heroicon-o-document-text')
                ->color('success')
                ->description($todayArticles . ' added today')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->chart($this->getArticleTrend()),

            Stat::make('Total Advertises', $totalAdvertises)
                ->icon('heroicon-o-megaphone')
                ->color('warning')
                ->description($todayAdvertises . ' today')
                ->descriptionIcon('heroicon-o-arrow-trending-up'),
        ];
    }

    protected function getArticleTrend(): array
    {
        $trend = [];
        $days = 7;

        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $trend[] = Article::whereDate('created_at', $date->toDateString())->count();
        }

        return $trend;
    }
}
