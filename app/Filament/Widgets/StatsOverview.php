<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Berita;
use App\Models\User;
use App\Models\Jurusan;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $user = auth()->user();
        
        // Admin: Total Berita, Total User, Total Jurusan
        if ($user->role === 'admin') {
            return [
                Stat::make('Total Berita', Berita::count())
                    ->description('Semua berita dalam sistem')
                    ->descriptionIcon('heroicon-m-newspaper')
                    ->color('primary')
                    ->chart([7, 12, 9, 14, 17, 15, 20]),
                
                Stat::make('Total User', User::count())
                    ->description('Pengguna terdaftar')
                    ->descriptionIcon('heroicon-m-user-group')
                    ->color('success')
                    ->chart([3, 5, 4, 7, 6, 8, 10]),
                
                Stat::make('Total Jurusan', Jurusan::count())
                    ->description('Program Keahlian')
                    ->descriptionIcon('heroicon-m-academic-cap')
                    ->color('info')
                    ->chart([5, 5, 6, 6, 7, 7, 8]),
            ];
        }
        
        // Redaktur: Menunggu Review, Sudah Terbit, Total Visible
        if ($user->role === 'redaktur') {
            $menungguReview = Berita::where('status', 'review')->count();
            $sudahTerbit = Berita::where('status', 'published')->count();
            $totalVisible = $menungguReview + $sudahTerbit; // Total berita yang bisa dilihat redaktur
            
            return [
                Stat::make('Menunggu Review', $menungguReview)
                    ->description('Berita perlu ditinjau')
                    ->descriptionIcon('heroicon-m-clock')
                    ->color('warning')
                    ->chart([$menungguReview - 2, $menungguReview - 1, $menungguReview, $menungguReview + 1]),
                
                Stat::make('Sudah Terbit', $sudahTerbit)
                    ->description('Berita dipublikasikan')
                    ->descriptionIcon('heroicon-m-check-circle')
                    ->color('success')
                    ->chart([$sudahTerbit - 5, $sudahTerbit - 3, $sudahTerbit - 1, $sudahTerbit]),
                
                Stat::make('Total Berita', $totalVisible)
                    ->description('Yang bisa Anda lihat')
                    ->descriptionIcon('heroicon-m-newspaper')
                    ->color('info')
                    ->chart([$totalVisible - 3, $totalVisible - 1, $totalVisible, $totalVisible + 2]),
            ];
        }
        
        // Jurnalis: Tulisan Saya, Terbit, Pending
        if ($user->role === 'jurnalis') {
            $tulisanSaya = Berita::where('user_id', $user->id)->count();
            $terbit = Berita::where('user_id', $user->id)
                ->where('status', 'published')
                ->count();
            $pending = Berita::where('user_id', $user->id)
                ->where('status', 'review')
                ->count();
            
            return [
                Stat::make('Tulisan Saya', $tulisanSaya)
                    ->description('Total artikel saya')
                    ->descriptionIcon('heroicon-m-pencil-square')
                    ->color('primary')
                    ->chart([$tulisanSaya - 3, $tulisanSaya - 2, $tulisanSaya - 1, $tulisanSaya]),
                
                Stat::make('Terbit', $terbit)
                    ->description('Artikel terpublikasi')
                    ->descriptionIcon('heroicon-m-check-badge')
                    ->color('success')
                    ->chart([$terbit - 2, $terbit - 1, $terbit, $terbit]),
                
                Stat::make('Pending Review', $pending)
                    ->description('Menunggu review redaktur')
                    ->descriptionIcon('heroicon-m-clock')
                    ->color('warning')
                    ->chart([$pending + 1, $pending, $pending - 1, $pending]),
            ];
        }
        
        // Default: Empty stats
        return [];
    }
}
