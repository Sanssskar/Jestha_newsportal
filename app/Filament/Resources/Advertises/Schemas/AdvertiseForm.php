<?php

namespace App\Filament\Resources\Advertises\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AdvertiseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('banner')
                    ->required(),
                TextInput::make('redirect_link')
                    ->required(),
                Toggle::make('status')
                    ->required(),
                TextInput::make('company_name')
                    ->required(),
            ]);
    }
}
