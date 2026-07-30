<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class ArticlePost extends ChartWidget
{
    protected ?string $heading = 'Articles Published';

    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 1;

    public ?string $filter = null;

    protected function getData(): array
    {
        $year = (int) ($this->filter ?? Carbon::now()->year);

        $data = $this->getArticlesPerMonth($year);

        return [
            'datasets' => [
                [
                    'label' => "Articles in {$year}",
                    'data' => $data['counts'],
                    // NOTE: swap these for your exact brand hex (navy / gold) from tailwind.config
                    'backgroundColor' => '#1e3a5f',
                    'borderColor' => '#1e3a5f',
                    'borderWidth' => 2,
                    'tension' => 0.3,
                    'fill' => false,
                ],
            ],
            'labels' => $data['months'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    /**
     * Get article count per month for a specific year
     */
    protected function getArticlesPerMonth(int $year): array
    {
        $months = [];
        $counts = [];

        for ($month = 1; $month <= 12; $month++) {
            $count = Article::whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->count();

            $months[] = Carbon::create($year, $month, 1)->format('M');
            $counts[] = $count;
        }

        return [
            'months' => $months,
            'counts' => $counts,
        ];
    }

    /**
     * Offer every year that actually has articles, newest first,
     * so the filter is only ever useful (not just the current year).
     */
    protected function getFilters(): ?array
    {
        $years = Article::selectRaw('DISTINCT YEAR(created_at) as year')
            ->orderByDesc('year')
            ->pluck('year', 'year')
            ->map(fn ($year) => (string) $year)
            ->toArray();

        return $years ?: [Carbon::now()->year => (string) Carbon::now()->year];
    }
}
