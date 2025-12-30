<?php

namespace App\Filament\Resources\Extracurriculars\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExtracurricularForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('logo'),
                Select::make('category')
                    ->options(['Olahraga' => 'Olahraga', 'Seni' => 'Seni', 'Akademik' => 'Akademik'])
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
