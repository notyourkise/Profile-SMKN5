<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->label('Kunci')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Textarea::make('value')
                    ->label('Nilai')
                    ->rows(3)
                    ->columnSpanFull(),
                Select::make('type')
                    ->label('Tipe')
                    ->options([
                        'text' => 'Text',
                        'textarea' => 'Textarea',
                        'number' => 'Number',
                        'email' => 'Email',
                        'url' => 'URL',
                    ])
                    ->default('text')
                    ->required(),
                Select::make('group')
                    ->label('Grup')
                    ->options([
                        'general' => 'Umum',
                        'contact' => 'Kontak',
                        'social' => 'Sosial Media',
                        'seo' => 'SEO',
                    ])
                    ->default('general')
                    ->required(),
            ]);
    }
}
