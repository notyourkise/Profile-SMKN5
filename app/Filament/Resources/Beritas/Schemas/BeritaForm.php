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
                    ->placeholder('Contoh: Siswa SMKN 5 Raih Juara 1 Lomba Robotika Nasional')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                    ->helperText('Buat judul yang menarik dan informatif (maksimal 255 karakter)'),
                
                TextInput::make('slug')
                    ->label('Slug (URL)')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255)
                    ->disabled()
                    ->dehydrated()
                    ->helperText('Otomatis dibuat dari judul, digunakan untuk URL berita'),
                
                RichEditor::make('konten')
                    ->label('Konten Berita')
                    ->placeholder('Tulis konten berita Anda di sini. Gunakan toolbar untuk format teks, menambahkan link, atau upload gambar tambahan...')
                    ->required()
                    ->columnSpanFull()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('berita/attachments')
                    ->helperText('Tulis minimal 200 karakter. Gunakan toolbar untuk formatting (Bold, Italic, Link, dll). Anda bisa upload gambar tambahan langsung di konten.'),
                
                FileUpload::make('gambar')
                    ->label('Gambar Utama')
                    ->image()
                    ->disk('public')
                    ->directory('berita')
                    ->imageEditor()
                    ->maxSize(2048)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->columnSpanFull()
                    ->helperText('Rekomendasi: Card kecil 1200x800px, Featured 1920x1080px | Format: JPG/PNG/WebP | Max: 2MB | Gunakan gambar berkualitas tinggi dan terang.'),
                
                Hidden::make('user_id')
                    ->default(fn () => auth()->id()),
                
                Select::make('status')
                    ->label('Status Berita')
                    ->options(function () use ($user) {
                        if ($user && $user->role === 'jurnalis') {
                            return [
                                'draft' => 'Draft (Simpan sementara)',
                                'review' => 'Review (Kirim ke Redaktur)',
                            ];
                        }
                        
                        if ($user && in_array($user->role, ['admin', 'redaktur'])) {
                            return [
                                'draft' => 'Draft',
                                'review' => 'Review',
                                'published' => 'Published (Tampil di Website)',
                            ];
                        }
                        
                        return [
                            'draft' => 'Draft',
                            'review' => 'Review',
                            'published' => 'Published',
                        ];
                    })
                    ->default(function () use ($user) {
                        if ($user && $user->role === 'jurnalis') {
                            return 'draft';
                        }
                        return 'draft';
                    })
                    ->required()
                    ->helperText(function () use ($user) {
                        if ($user && $user->role === 'jurnalis') {
                            return 'Draft: Hanya Anda yang bisa lihat | Review: Kirim ke Redaktur untuk persetujuan';
                        }
                        if ($user && $user->role === 'redaktur') {
                            return 'Draft: Tersimpan | Review: Menunggu persetujuan | Published: Langsung tayang di website';
                        }
                        if ($user && $user->role === 'admin') {
                            return 'Anda memiliki akses penuh untuk mengatur status berita';
                        }
                        return null;
                    }),
                    
                DateTimePicker::make('published_at')
                    ->label('Tanggal & Waktu Publish')
                    ->nullable()
                    ->native(false)
                    ->visible(fn () => $user && in_array($user->role, ['admin', 'redaktur']))
                    ->helperText('Kosongkan untuk menggunakan waktu saat ini, atau atur tanggal spesifik untuk penjadwalan'),
                    
                Toggle::make('is_featured')
                    ->label('Berita Utama (Featured)')
                    ->helperText('Berita featured akan ditampilkan di slider homepage dengan gambar besar. Hanya 1 berita yang bisa featured (berita lain otomatis non-featured)')
                    ->default(false)
                    ->visible(fn () => $user && in_array($user->role, ['admin', 'redaktur']))
                    ->columnSpanFull(),
            ]);
    }
}
