<?php

namespace App\Filament\Resources\Beritas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
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
                // SECTION: Panduan Penggunaan
                Section::make('📖 Panduan Membuat Berita')
                    ->description('Ikuti panduan berikut untuk membuat berita yang baik dan optimal untuk website')
                    ->schema([
                        TextInput::make('panduan_info')
                            ->label('')
                            ->disabled()
                            ->default('✅ Tulis judul yang menarik dan deskriptif | ✅ Konten minimal 200 karakter | ✅ Upload gambar dengan kualitas baik | ✅ Pilih status sesuai kebutuhan')
                            ->columnSpanFull()
                            ->dehydrated(false),
                    ])
                    ->collapsible()
                    ->collapsed(fn ($operation) => $operation === 'edit'), // Collapsed saat edit, expanded saat create
                
                // SECTION: Informasi Berita
                Section::make('📝 Informasi Berita')
                    ->description('Isi informasi utama berita')
                    ->schema([
                        TextInput::make('judul')
                            ->label('Judul Berita')
                            ->placeholder('Contoh: Siswa SMKN 5 Raih Juara 1 Lomba Robotika Nasional')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                            ->helperText('💡 Buat judul yang menarik dan informatif (maksimal 255 karakter)'),
                        
                        TextInput::make('slug')
                            ->label('Slug (URL)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->disabled()
                            ->dehydrated()
                            ->helperText('🔗 Otomatis dibuat dari judul, digunakan untuk URL berita'),
                        
                        RichEditor::make('konten')
                            ->label('Konten Berita')
                            ->placeholder('Tulis konten berita Anda di sini. Gunakan toolbar untuk format teks, menambahkan link, atau upload gambar tambahan...')
                            ->required()
                            ->columnSpanFull()
                            ->fileAttachmentsDisk('public')
                            ->fileAttachmentsDirectory('berita/attachments')
                            ->helperText('📄 Tulis minimal 200 karakter. Gunakan toolbar untuk formatting (Bold, Italic, Link, dll). Anda bisa upload gambar tambahan langsung di konten.'),
                    ]),
                
                // SECTION: Gambar Utama
                Section::make('🖼️ Gambar Utama Berita')
                    ->description('Upload gambar yang akan ditampilkan sebagai thumbnail berita')
                    ->schema([
                        FileUpload::make('gambar')
                            ->label('Upload Gambar')
                            ->image()
                            ->disk('public')
                            ->directory('berita')
                            ->imageEditor()
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->columnSpanFull()
                            ->helperText('
📐 **Rekomendasi Ukuran:**
• Card Kecil (List Berita): 800x600px atau 1200x800px (4:3 atau 3:2)
• Card Featured (Berita Utama): 1920x1080px atau 1600x900px (16:9)
• Rasio ideal: 16:9 untuk featured, 4:3 untuk card biasa

📁 **Spesifikasi File:**
• Format: JPG, PNG, atau WebP
• Ukuran maksimal: 2MB (2048KB)
• Resolusi minimum: 800x600px
• Resolusi maksimum: 1920x1200px

💡 **Tips:**
✅ Gunakan gambar berkualitas tinggi dan terang
✅ Hindari gambar blur atau pecah
✅ Pastikan objek utama berada di tengah
✅ Compress gambar terlebih dahulu jika >2MB
                            '),
                    ])
                    ->collapsible(),
                
                Hidden::make('user_id')
                    ->default(fn () => auth()->id()),
                
                // SECTION: Status & Publikasi
                Section::make('🚀 Status & Publikasi')
                    ->description('Atur status dan waktu publikasi berita')
                    ->schema([
                        // STATUS FIELD - Workflow based on role
                        Select::make('status')
                            ->label('Status Berita')
                            ->options(function () use ($user) {
                                // Jurnalis hanya bisa pilih Draft dan Review (tidak bisa publish)
                                if ($user && $user->role === 'jurnalis') {
                                    return [
                                        'draft' => '📝 Draft (Simpan sementara)',
                                        'review' => '📤 Review (Kirim ke Redaktur)',
                                    ];
                                }
                                
                                // Redaktur dan Admin bisa akses semua status
                                if ($user && in_array($user->role, ['admin', 'redaktur'])) {
                                    return [
                                        'draft' => '📝 Draft',
                                        'review' => '🔍 Review',
                                        'published' => '✅ Published (Tampil di Website)',
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
                                    return '
📝 **Draft:** Berita disimpan tapi belum dikirim (hanya Anda yang bisa lihat)
📤 **Review:** Kirim ke Redaktur untuk ditinjau dan disetujui
⚠️ Anda tidak bisa langsung publish, harus melalui persetujuan Redaktur
                                    ';
                                }
                                if ($user && $user->role === 'redaktur') {
                                    return '
📝 **Draft:** Berita tersimpan (belum terbit)
🔍 **Review:** Berita dari Jurnalis yang menunggu persetujuan
✅ **Published:** Berita langsung tayang di website publik
                                    ';
                                }
                                if ($user && $user->role === 'admin') {
                                    return '⚙️ Full control: Anda bisa mengatur status berita ke Draft, Review, atau Published';
                                }
                                return null;
                            }),
                            
                        DateTimePicker::make('published_at')
                            ->label('Tanggal & Waktu Publish')
                            ->nullable()
                            ->native(false)
                            ->visible(fn () => $user && in_array($user->role, ['admin', 'redaktur']))
                            ->helperText('📅 Kosongkan untuk otomatis menggunakan waktu saat ini. Atur tanggal spesifik untuk penjadwalan.'),
                            
                        Toggle::make('is_featured')
                            ->label('⭐ Berita Utama (Featured)')
                            ->helperText('
🌟 **Berita Featured akan:**
• Ditampilkan di slider utama homepage
• Menggunakan gambar ukuran besar (1920x1080px recommended)
• Hanya 1 berita yang bisa featured (berita lain otomatis non-featured)

💡 Pilih berita paling penting/terbaru untuk dijadikan featured
                            ')
                            ->default(false)
                            ->visible(fn () => $user && in_array($user->role, ['admin', 'redaktur']))
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
