<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestArticles extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int | string | array $columnSpan = 2;

    protected function getTableHeading(): ?string
    {
        return 'Latest Articles';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Article::query()->latest()->limit(8)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('')
                    ->square()
                    ->width(48)
                    ->height(48),

                Tables\Columns\TextColumn::make('title')
                    ->limit(40)
                    ->searchable()
                    ->weight('semibold'),

                // Article <-> Category is many-to-many (via article_category),
                // so this pulls the related categories as a comma list of badges.
                Tables\Columns\TextColumn::make('categories.title')
                    ->label('Categories')
                    ->badge()
                    ->color('info')
                    ->separator(','),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Published' : 'Draft')
                    ->color(fn (bool $state): string => $state ? 'success' : 'gray'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Published')
                    ->dateTime('M d, Y')
                    ->sortable(),
            ])
            ->paginated(false);
    }
}
