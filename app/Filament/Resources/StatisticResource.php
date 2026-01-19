<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatisticResource\Pages;
use App\Models\Statistic;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use UnitEnum;

class StatisticResource extends Resource
{
    protected static ?string $model = Statistic::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static ?string $navigationLabel = 'Statistik';

    protected static ?string $modelLabel = 'Statistik';

    protected static ?string $pluralModelLabel = 'Data Statistik';

    protected static UnitEnum|string|null $navigationGroup = 'Pengaturan Website';

    protected static ?int $navigationSort = 1;

    public static function shouldRegisterNavigation(): bool
    {
        return in_array(auth()->user()->role, ['admin', 'redaktur']);
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Statistik')
                    ->description('Isi data statistik yang akan ditampilkan di halaman utama')
                    ->schema([
                        TextInput::make('label')
                            ->label('Judul')
                            ->helperText('Contoh: SISWA AKTIF, GURU & STAFF, ALUMNI TERSERAP')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('SISWA AKTIF')
                            ->columnSpanFull(),

                        TextInput::make('value')
                            ->label('Angka/Nilai')
                            ->helperText('Contoh: 1.520, 120, 98%')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('1.520'),

                        TextInput::make('description')
                            ->label('Deskripsi')
                            ->helperText('Deskripsi singkat untuk statistik ini')
                            ->maxLength(500)
                            ->placeholder('Siswa aktif dari berbagai jurusan...')
                            ->columnSpanFull(),

                        TextInput::make('icon')
                            ->label('Class FontAwesome')
                            ->helperText('Copy class dari fontawesome.com (Contoh: fa-solid fa-users)')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('fa-solid fa-users')
                            ->prefix('📦'),

                        TextInput::make('order')
                            ->label('Urutan Tampil')
                            ->helperText('Semakin kecil angkanya, semakin awal ditampilkan')
                            ->numeric()
                            ->default(0)
                            ->required()
                            ->minValue(0)
                            ->maxValue(100),

                        Toggle::make('is_big')
                            ->label('Tampilkan Sebagai Card Besar?')
                            ->helperText('Card besar akan memiliki ukuran 2x lebih besar (cocok untuk data utama)')
                            ->default(false)
                            ->inline(false)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable()
                    ->badge()
                    ->color('gray')
                    ->alignCenter(),

                TextColumn::make('label')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->color('primary'),

                TextColumn::make('value')
                    ->label('Nilai')
                    ->searchable()
                    ->badge()
                    ->color('success')
                    ->size('lg'),

                TextColumn::make('icon')
                    ->label('Icon Preview')
                    ->formatStateUsing(fn (string $state): string => "<i class='$state text-2xl text-blue-600'></i>")
                    ->html()
                    ->alignCenter(),

                IconColumn::make('is_big')
                    ->label('Card Besar?')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('gray')
                    ->alignCenter(),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Diupdate Pada')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_big')
                    ->label('Card Besar')
                    ->placeholder('Semua')
                    ->trueLabel('Ya')
                    ->falseLabel('Tidak'),
            ])
            ->recordActions([
                EditAction::make()
                    ->iconButton()
                    ->tooltip('Edit'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order')
            ->defaultSort('order', 'asc')
            ->emptyStateHeading('Belum ada data statistik')
            ->emptyStateDescription('Klik tombol "Buat Baru" untuk menambah data statistik pertama.')
            ->emptyStateIcon('heroicon-o-chart-bar-square');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStatistics::route('/'),
            'create' => Pages\CreateStatistic::route('/create'),
            'edit' => Pages\EditStatistic::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 5 ? 'warning' : 'success';
    }
}
