<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccomodationResource\Pages;
use App\Filament\Resources\AccomodationResource\RelationManagers;
use App\Filament\Resources\AccomodationResource\RelationManagers\ContactsRelationManager;
use App\Models\Accomodation;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AccomodationResource extends Resource
{
    protected static ?string $model = Accomodation::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Accomodation')
                    ->schema([
                        Forms\Components\FileUpload::make('image_url')
                            ->columnSpan('full'),

                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('is_active')
                            ->required()
                            ->inline(false),
                        Forms\Components\Select::make('contact_id')
                            ->label('Contact')
                            ->options(Contact::all()->pluck('name', 'id'))
                            ->required()
                            ->searchable(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('slug')->searchable()->sortable(),
                Tables\Columns\BooleanColumn::make('is_active')->sortable(),
                Tables\Columns\ImageColumn::make('image_url'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ContactsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAccomodations::route('/'),
            'create' => Pages\CreateAccomodation::route('/create'),
            'edit' => Pages\EditAccomodation::route('/{record}/edit'),
        ];
    }
}
