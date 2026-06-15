<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('company_name')
                    ->default(null),
                TextInput::make('banner')
                    ->default(null),
                Select::make('service_type')
                    ->options(['one_day' => 'One day', 'one_month' => 'One month', 'one_year' => 'One year'])
                    ->required(),
            ]);
    }
}
