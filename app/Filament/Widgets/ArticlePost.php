<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class ArticlePost extends ChartWidget
{
    protected ?string $heading = 'Articles Published';

    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    // Optional: Allow user to filter by year
    public ?int $year = null;

    protected function getData(): array
    {
        $year = $this->year ?? Carbon::now()->year;

        $data = $this->getArticlesPerMonth($year);

        return [
            'datasets' => [
                [
                    'label' => "Articles in {$year}",
                    'data' => $data['counts'],
                    'backgroundColor' => '#10b981',   // Emerald color
                    'borderColor' => '#10b981',
                    'borderWidth' => 2,
                    'tension' => 0.3,
                ],
            ],
            'labels' => $data['months'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';        // Change to 'line' if you prefer
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

    // Optional: Add filter to switch years
    protected function getFilters(): ?array
    {
        $currentYear = Carbon::now()->year;
        $options = [];

        for ($y = $currentYear; $y <= $currentYear; $y++) {
            $options[$y] = (string) $y;
        }

        return $options;
    }
}
