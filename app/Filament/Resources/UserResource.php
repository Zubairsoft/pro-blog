<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Domains\Supports\Enums\GenderEnum;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 3;


    const MALE = GenderEnum::MALE;

    const FEMALE = GenderEnum::FEMALE;

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')->label(__('validation.attributes.first_name'))
                    ->required()->minLength(2)->maxLength(255),
                Forms\Components\TextInput::make('last_name')->label(__('validation.attributes.last_name'))
                    ->required()->minLength(2)->maxLength(255),
                Forms\Components\TextInput::make('email')->label(__('validation.attributes.email'))
                    ->required()->email()->maxLength(255),
                Forms\Components\Select::make('gender')->label(__('validation.attributes.gender'))
                    ->options([
                        self::MALE => GenderEnum::getDescription(self::MALE),
                        self::FEMALE => GenderEnum::getDescription(self::FEMALE)
                    ])->required(),
                Forms\Components\Select::make('local')->label(__('validation.attributes.local'))
                    ->options([
                        'ar' => __('keywords.ar'),
                        'en' => __('keywords.en')
                    ])->required(),
                    SpatieMediaLibraryFileUpload::make('avatar')->maxFiles(2 * 1024)
                    ->collection('avatar'),
                Forms\Components\TextInput::make('password')->label(__('validation.attributes.password'))
                    ->required()->minLength(8)->maxLength(255)->password(),
                Forms\Components\Toggle::make('is_active')->label(__('validation.attributes.status')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')->label(__('validation.attributes.first_name'))->searchable()->sortable(),
                Tables\Columns\TextColumn::make('last_name')->label(__('validation.attributes.last_name'))->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->label(__('validation.attributes.email'))->searchable(),
                Tables\Columns\TextColumn::make('gender_translate')->label(__('validation.attributes.gender')),
                Tables\Columns\TextColumn::make('local')->label(__('validation.attributes.local')),
                Tables\Columns\IconColumn::make('is_active')->label(__('validation.attributes.status'))
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('is_active')
                    ->options([
                        true => __('keywords.active'),
                        false => __('keywords.dis_active'),
                    ]),

                Tables\Filters\SelectFilter::make('gender')
                    ->options([
                        self::MALE => GenderEnum::getDescription(self::MALE),
                        self::FEMALE => GenderEnum::getDescription(self::FEMALE)
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-user-group';
    }

    public static function getNavigationGroup(): ?string
    {
        return __('resources.users');
    }

    public static function getModelLabel(): string
    {
        return __('resources.users');
    }


    public static function getPluralModelLabel(): string
    {
        return __('resources.users');
    }
}
