<?php

namespace App\Filament\Resources\Menus\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenusTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')
                    ->label('Order')
                    ->sortable()
                    ->badge()
                    ->color('gray'),

                TextColumn::make('title')
                    ->label('Menu Title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'link' => 'success',
                        'dropdown' => 'warning',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'link' => 'Link',
                        'dropdown' => 'Dropdown',
                    }),

                TextColumn::make('url')
                    ->label('URL')
                    ->searchable()
                    ->limit(40)
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('parent.title')
                    ->label('Parent Menu')
                    ->searchable()
                    ->placeholder('—')
                    ->toggleable(),

                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean()
                    ->sortable(),

                IconColumn::make('open_new_tab')
                    ->label('New Tab')
                    ->boolean()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order') // Enable drag & drop reordering
            ->paginationPageOptions([10, 25, 50]);
    }
}
