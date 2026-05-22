<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("Basic Information")
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        Select::make('categories')
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->relationship('categories','title'),
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('slug')
                            ->required(),
                        RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('author_name')
                            ->required(),
                        FileUpload::make('image')
                            ->image()
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Section::make('Meta information')
                    ->columns(2)
                    ->columnSpanFull()
                    ->description("meta information input from here")
                    ->schema([
                        TextInput::make('meta_title')
                            ->default(null),
                        Textarea::make('meta_keytwords')
                            ->default(null)
                            ->columnSpanFull(),
                        Textarea::make('meta_description')
                            ->default(null)
                            ->columnSpanFull(),
                    ])
            ]);
    }
}
