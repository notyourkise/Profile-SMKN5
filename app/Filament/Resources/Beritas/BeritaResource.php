<?php

namespace App\Filament\Resources\Beritas;

use App\Filament\Resources\Beritas\Pages\CreateBerita;
use App\Filament\Resources\Beritas\Pages\EditBerita;
use App\Filament\Resources\Beritas\Pages\ListBeritas;
use App\Filament\Resources\Beritas\Schemas\BeritaForm;
use App\Filament\Resources\Beritas\Tables\BeritasTable;
use App\Models\Berita;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use UnitEnum;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    protected static ?string $navigationLabel = 'Berita';

    protected static ?string $modelLabel = 'Berita';

    protected static ?string $pluralModelLabel = 'Berita';

    protected static UnitEnum|string|null $navigationGroup = 'Pengaturan Website';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'judul';

    // All roles can see Berita menu (Admin, Redaktur, Jurnalis)
    public static function shouldRegisterNavigation(): bool
    {
        return true;
    }

    /**
     * ROLE-BASED QUERY SCOPE
     * Jurnalis can only see their own posts
     * Redaktur and Admin can see all posts
     */
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $user = auth()->user();

        // If Jurnalis, only show their own posts
        if ($user && $user->role === 'jurnalis') {
            return $query->where('user_id', $user->id);
        }

        // Redaktur and Admin see all posts
        return $query;
    }

    public static function form(Schema $schema): Schema
    {
        return BeritaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BeritasTable::configure($table);
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
            'index' => ListBeritas::route('/'),
            'create' => CreateBerita::route('/create'),
            'edit' => EditBerita::route('/{record}/edit'),
        ];
    }
}
