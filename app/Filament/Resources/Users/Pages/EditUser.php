<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load current role into form
        $data['role'] = $this->record->roles->first()?->name;
        return $data;
    }

    protected function afterSave(): void
    {
        // Update role after saving
        if (isset($this->data['role'])) {
            $this->record->syncRoles([$this->data['role']]);
        }
    }
}
