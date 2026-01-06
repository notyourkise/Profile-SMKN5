<?php

namespace App\Filament\Resources\StatisticResource\Pages;

use App\Filament\Resources\StatisticResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditStatistic extends EditRecord
{
    protected static string $resource = StatisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus')
                ->requiresConfirmation()
                ->modalHeading('Hapus Data Statistik')
                ->modalDescription('Apakah Anda yakin ingin menghapus data statistik ini? Data yang dihapus tidak dapat dikembalikan.')
                ->modalSubmitActionLabel('Ya, Hapus')
                ->successNotification(
                    Notification::make()
                        ->success()
                        ->title('Data Berhasil Dihapus')
                        ->body('Data statistik telah dihapus dari sistem.')
                ),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Data Berhasil Diperbarui')
            ->body('Perubahan data statistik telah tersimpan.')
            ->duration(5000);
    }
}
