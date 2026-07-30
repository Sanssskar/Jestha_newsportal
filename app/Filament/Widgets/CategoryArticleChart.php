<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class CategoryArticleChart extends ChartWidget
{
    protected ?string $heading = 'Articles by Category';

    protected static ?int $sort = 3;
    protected int | string | array $columnSpan = 1;

    // Palette large enough to cover most category counts without repeats.
    // Swap for exact brand hexes if you want the dashboard to match the site theme.
    protected array $palette = [
        '#1e3a5f', '#c9a227', '#2f6b4f', '#8b5e3c',
        '#5b6470', '#a44a3f', '#3d7a91', '#6b4c9a',
    ];

    protected function getData(): array
    {
        $categories = Category::withCount('articles')
            ->having('articles_count', '>', 0)
            ->orderByDesc('articles_count')
            ->get();

        $colors = [];
        foreach ($categories as $i => $category) {
            $colors[] = $this->palette[$i % count($this->palette)];
        }

        return [
            'datasets' => [
                [
                    'data' => $categories->pluck('articles_count')->toArray(),
                    'backgroundColor' => $colors,
                ],
            ],
            'labels' => $categories->pluck('title')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
