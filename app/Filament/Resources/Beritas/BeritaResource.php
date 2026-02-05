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
     * Jurnalis: Only see their own posts (all statuses)
     * Redaktur: Only see 'review' and 'published' posts (not draft from jurnalis)
     * Admin: See all posts
     */
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery();

        $user = auth()->user();

        // If Jurnalis, only show their own posts (all statuses: draft, review, published)
        if ($user && $user->role === 'jurnalis') {
            return $query->where('user_id', $user->id);
        }

        // If Redaktur, only show 'review' and 'published' posts (hide draft from jurnalis)
        if ($user && $user->role === 'redaktur') {
            return $query->whereIn('status', ['review', 'published']);
        }

        // Admin sees all posts (all statuses)
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
