<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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
                
                // STATUS FIELD - Workflow based on role
                Select::make('status')
                    ->label('Status Berita')
                    ->options(function () use ($user) {
                        // Jurnalis hanya bisa pilih Draft dan Review (tidak bisa publish)
                        if ($user && $user->role === 'jurnalis') {
                            return [
                                'draft' => 'Draft',
                                'review' => 'Review (Kirim ke Redaktur)',
                            ];
                        }
                        
                        // Redaktur dan Admin bisa akses semua status
                        if ($user && in_array($user->role, ['admin', 'redaktur'])) {
                            return [
                                'draft' => 'Draft',
                                'review' => 'Review',
                                'published' => 'Published',
                            ];
                        }
                        
                        return [
                            'draft' => 'Draft',
                            'review' => 'Review',
                            'published' => 'Published',
                        ];
                    })
                    ->default(function () use ($user) {
                        // Jurnalis defaults to 'draft'
                        if ($user && $user->role === 'jurnalis') {
                            return 'draft';
                        }
                        return 'draft';
                    })
                    ->required()
                    ->helperText(function () use ($user) {
                        if ($user && $user->role === 'jurnalis') {
                            return '📝 Pilih "Review" untuk mengirim berita ke Redaktur untuk disetujui';
                        }
                        if ($user && $user->role === 'redaktur') {
                            return '✅ Ubah ke "Published" untuk menerbitkan berita ke website';
                        }
                        if ($user && $user->role === 'admin') {
                            return '⚙️ Full control: Draft, Review, atau Published';
                        }
                        return null;
                    }),
                    
                DateTimePicker::make('published_at')
                    ->label('Tanggal Publish')
                    ->nullable()
                    ->visible(fn () => $user && in_array($user->role, ['admin', 'redaktur'])),
                    
                Toggle::make('is_featured')
                    ->label('Tampilkan sebagai Berita Utama (Featured)')
                    ->helperText('Hanya 1 berita yang dapat menjadi featured. Berita lain akan otomatis non-featured.')
                    ->default(false)
                    ->visible(fn () => $user && in_array($user->role, ['admin', 'redaktur']))
                    ->columnSpanFull(),
            ]);
    }
}
