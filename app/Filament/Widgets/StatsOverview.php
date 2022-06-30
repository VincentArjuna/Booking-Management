<?php

namespace App\Filament\Widgets;

use App\Models\Accomodation;
use App\Models\Booking;
use App\Models\Room;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Accomodation', Accomodation::query()->count()),
            Card::make('Room', Room::query()->count()),
            Card::make('Booking', Booking::query()->count()),
        ];
    }
}
