<?php

namespace App\Filament\Resources\Beritas\Pages;

use App\Filament\Resources\Beritas\BeritaResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBerita extends CreateRecord
{
    protected static string $resource = BeritaResource::class;

    /**
     * Auto-set user_id and default status based on role
     */
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth()->user();

        // Auto-set user_id to current user
        $data['user_id'] = $user->id;

        // If Jurnalis creates berita, default status is 'draft'
        if ($user->role === 'jurnalis' && !isset($data['status'])) {
            $data['status'] = 'draft';
        }

        // If status is not set, default to 'draft'
        if (!isset($data['status']) || empty($data['status'])) {
            $data['status'] = 'draft';
        }

        return $data;
    }
}
