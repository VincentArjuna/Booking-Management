<?php

namespace App\Filament\Resources\AccomodationResource\Pages;

use App\Filament\Resources\AccomodationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccomodation extends EditRecord
{
    protected static string $resource = AccomodationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function mutateFormDataBeforeSave(array $data): array
    {
        $data['slug'] = str()->slug($data['name']);
        return $data;
    }
}
