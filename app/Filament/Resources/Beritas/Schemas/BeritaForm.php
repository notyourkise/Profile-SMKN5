<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BeritaForm
{
    public static function configure(Schema $schema): Schema
    {
        $user = auth()->user();
        
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul Berita')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->disabled()
                    ->dehydrated(),
                RichEditor::make('konten')
                    ->label('Konten')
                    ->required()
                    ->columnSpanFull()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('berita/attachments'),
                FileUpload::make('gambar')
                    ->label('Gambar Utama')
                    ->image()
                    ->disk('public')
                    ->directory('berita')
                    ->imageEditor()
                    ->maxSize(2048)
                    ->columnSpanFull(),
                Hidden::make('user_id')
                    ->default(fn () => auth()->id()),
                
                // CONDITIONAL STATUS FIELD - Only visible to Redaktur and Admin
                Select::make('status')
                    ->label('Status')
                    ->options([
                        'draft' => 'Draft',
                        'pending' => 'Pending Review',
                        'published' => 'Published'
                    ])
                    ->default(function () use ($user) {
                        // Jurnalis posts default to 'pending'
                        if ($user && $user->role === 'jurnalis') {
                            return 'pending';
                        }
                        return 'draft';
                    })
                    ->required()
                    ->visible(fn () => $user && in_array($user->role, ['admin', 'redaktur']))
                    ->disabled(fn () => $user && $user->role === 'jurnalis'),
                    
                // Hidden status field for Jurnalis (auto-set to pending)
                Hidden::make('status')
                    ->default('pending')
                    ->visible(fn () => $user && $user->role === 'jurnalis'),
                    
                DateTimePicker::make('published_at')
                    ->label('Tanggal Publish')
                    ->nullable()
                    ->visible(fn () => $user && in_array($user->role, ['admin', 'redaktur'])),
            ]);
    }
}
