<?php

namespace App\Filament\Resources\StatisticResource\Pages;

use App\Filament\Resources\StatisticResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateStatistic extends CreateRecord
{
    protected static string $resource = StatisticResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Data Statistik Berhasil Ditambahkan')
            ->body('Data statistik telah tersimpan dan akan tampil di website.')
            ->duration(5000);
    }
}
