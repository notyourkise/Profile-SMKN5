<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company_name')
                    ->required(),
                TextInput::make('logo'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('website_url')
                    ->url(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
