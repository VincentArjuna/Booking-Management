<?php

namespace App\Filament\Resources\AccomodationResource\Pages;

use App\Filament\Resources\AccomodationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccomodations extends ListRecords
{
    protected static string $resource = AccomodationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
