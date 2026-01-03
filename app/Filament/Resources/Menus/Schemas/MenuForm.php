<?php

namespace App\Filament\Resources\Menus\Schemas;

use App\Models\Menu;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')
                ->label('Menu Title')
                ->required()
                ->maxLength(255)
                ->placeholder('e.g., About Us')
                ->columnSpan(2),

            Select::make('type')
                ->label('Menu Type')
                ->options([
                    'link' => 'Link Biasa',
                    'dropdown' => 'Dropdown (Parent)',
                ])
                ->required()
                ->default('link')
                ->live()
                ->afterStateUpdated(function ($state, callable $set) {
                    if ($state === 'dropdown') {
                        $set('url', null);
                    }
                }),

            TextInput::make('url')
                ->label('URL')
                ->placeholder('e.g., /about, https://example.com')
                ->maxLength(255)
                ->hidden(fn (callable $get) => $get('type') === 'dropdown')
                ->required(fn (callable $get) => $get('type') === 'link'),

            Select::make('parent_id')
                ->label('Parent Menu (Optional)')
                ->placeholder('Select parent menu for sub-menu')
                ->relationship('parent', 'title')
                ->searchable()
                ->preload()
                ->nullable()
                ->helperText('Leave empty for top-level menu.'),

            TextInput::make('order')
                ->label('Order')
                ->numeric()
                ->default(0)
                ->required()
                ->helperText('Menu will be sorted from smallest to largest.'),

            TextInput::make('icon')
                ->label('Icon (Optional)')
                ->placeholder('e.g., heroicon-o-home')
                ->maxLength(255)
                ->helperText('Heroicon name for menu icon.'),

            Toggle::make('is_active')
                ->label('Active')
                ->default(true)
                ->inline(false)
                ->helperText('Toggle to show/hide menu.'),

            Toggle::make('open_new_tab')
                ->label('Open in New Tab')
                ->default(false)
                ->inline(false)
                ->hidden(fn (callable $get) => $get('type') === 'dropdown')
                ->helperText('Link will open in new tab if enabled.'),
        ])->columns(2);
    }
}
