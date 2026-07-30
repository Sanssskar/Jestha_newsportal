<?php

namespace App\Filament\Widgets;

use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends StatsOverviewWidget
{
    protected ?string $pollingInterval = '15s';

    protected function getStats(): array
    {
        $now = Carbon::now();

        $totalCategories = Category::count();
        $totalArticles   = Article::count();

        $todayArticles = Article::whereDate('created_at', $now->toDateString())->count();

        $activeAdvertises = Advertise::where('status', true)
            ->where('expiry_date', '>=', $now)
            ->count();

        $pendingRequests = Contact::where('payment_status', 'pending')->count();

        $totalRevenue = Contact::where('payment_status', 'paid')->sum('payment_amount');

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

            Stat::make('Active Advertises', $activeAdvertises)
                ->icon('heroicon-o-megaphone')
                ->color('warning')
                ->description(Advertise::count() . ' total placed'),

            Stat::make('Pending Requests', $pendingRequests)
                ->icon('heroicon-o-clock')
                ->color($pendingRequests > 0 ? 'danger' : 'gray')
                ->description($pendingRequests > 0 ? 'Awaiting payment/approval' : 'All caught up')
                ->descriptionIcon($pendingRequests > 0 ? 'heroicon-o-exclamation-circle' : 'heroicon-o-check-circle'),

            Stat::make('Advertise Revenue', 'Rs. ' . number_format($totalRevenue))
                ->icon('heroicon-o-banknotes')
                ->color('success')
                ->description('Total collected via Khalti'),
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
