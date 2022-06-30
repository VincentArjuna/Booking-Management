<?php

namespace Database\Seeders;

use App\Models\Accomodation;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'email' => 'admin@admin.com',
        ]);

        $contacts = Contact::factory(1)->create();

        $contacts->each(
            fn (Contact $contact) => $contact
        );

        $accomodations = Accomodation::factory(1)
            ->create()
            ->each(function ($accomodation) use ($contacts) {
                $accomodation->update(['contact_id' => $contacts->random()->id]);
            });

        $accomodations->each(
            fn (Accomodation $accomodation) => $accomodation
        );

        $room_types = RoomType::factory(1)
            ->create()
            ->each(function ($room_type) use ($accomodations) {
                $room_type->update(['accomodation_id' => $accomodations->random()->id]);
            });

        $room_types->each(
            fn (RoomType $room_type) => $room_type
        );

        $rooms = Room::factory(1)
            ->create()
            ->each(function ($room) use ($room_types) {
                $room->update(['room_type_id' => $room_types->random()->id]);
            });

        $rooms->each(
            fn (Room $room) => $room
        );

        Booking::factory(1)->create()
            ->each(function ($booking) use ($rooms) {
                $booking->update(['room_id' => $rooms->random()->id]);
            });
    }
}
