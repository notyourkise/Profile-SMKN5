<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\HtmlString; // <--- Pastikan ini ada

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()

            // =========================================================
            //  🛠️ BRANDING SMKN 5 (FIX LOGO RAKSASA)
            // =========================================================
            
            // 1. Favicon (Logo Kecil di Tab Browser)
            ->favicon(asset('images/logo-smk-utama.png'))

            // 2. Custom Brand (Logo + Teks) dengan Inline Style
            // Kita pakai style="height: 40px" agar ukurannya terkunci
            ->brandName(fn () => new HtmlString('
                <div style="display: flex; align-items: center; gap: 12px;">
                    <img 
                        src="'.asset('images/logo-smk-utama.png').'" 
                        alt="Logo SMKN 5" 
                        style="height: 40px; width: auto;" 
                    />
                    <span style="font-weight: 700; font-size: 1.1rem; letter-spacing: -0.025em; color: white;">
                        SMK NEGERI 5
                    </span>
                </div>
            '))

            // PENTING: Pastikan brandLogo() DIHAPUS atau dikomentari
            // ->brandLogo(asset('images/logo-smk-utama.png')) 
            
            // Warna Tema
            ->colors([
                'primary' => '#1e5494',
            ])

            // =========================================================

            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class, // Widget info dimatikan
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}