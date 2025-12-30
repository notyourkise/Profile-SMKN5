<?php

namespace App\Filament\Resources\Jurusans\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class JurusanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode')
                    ->label('Kode Jurusan')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(10)
                    ->placeholder('Contoh: RPL, TKJ'),
                TextInput::make('nama')
                    ->label('Nama Jurusan')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Contoh: Rekayasa Perangkat Lunak'),
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->rows(5)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('jurusan')
                    ->imageEditor()
                    ->maxSize(2048),
                TextInput::make('durasi_tahun')
                    ->label('Durasi (Tahun)')
                    ->required()
                    ->numeric()
                    ->default(3)
                    ->minValue(1)
                    ->maxValue(4),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
