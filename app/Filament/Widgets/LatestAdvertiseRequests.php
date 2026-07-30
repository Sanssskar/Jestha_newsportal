<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestAdvertiseRequests extends BaseWidget
{
    protected static ?int $sort = 5;
    protected int | string | array $columnSpan = 2;

    protected function getTableHeading(): ?string
    {
        return 'Latest Advertise Requests';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Contact::query()->latest()->limit(8)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->weight('semibold')
                    ->searchable(),

                Tables\Columns\TextColumn::make('service_type')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('payment_status')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'paid' => 'success',
                        'pending' => 'warning',
                        'failed' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('payment_amount')
                    ->label('Amount')
                    ->money('NPR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Submitted')
                    ->since()
                    ->sortable(),
            ])
            ->paginated(false);
    }
}
