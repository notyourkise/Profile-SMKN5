<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    
                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                
                Select::make('role')
                    ->label('Role')
                    ->options(Role::all()->pluck('name', 'name'))
                    ->searchable()
                    ->required()
                    ->helperText('Pilih role untuk user ini: Admin (Full Access), Redaktur (Manage Berita), atau Jurnalis (Write Only)'),
                
                TextInput::make('password')
                    ->password()
                    ->required(fn ($context) => $context === 'create')
                    ->dehydrateStateUsing(fn ($state) => filled($state) ? Hash::make($state) : null)
                    ->dehydrated(fn ($state) => filled($state))
                    ->revealable()
                    ->helperText('Kosongkan jika tidak ingin mengubah password'),
            ]);
    }
}
