<?php

namespace App\Filament\Resources\AccomodationResource\Pages;

use App\Filament\Resources\AccomodationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAccomodation extends CreateRecord
{
    protected static string $resource = AccomodationResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = str()->slug($data['name']);
        return $data;
    }
}
