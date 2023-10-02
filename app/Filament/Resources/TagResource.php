<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagResource\Pages;
use App\Filament\Resources\TagResource\RelationManagers;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_ar')->label(__('validation.attributes.name_ar'))
                    ->required()->minLength(3)->maxLength(100),
                Forms\Components\TextInput::make('name_en')->label(__('validation.attributes.name_en'))
                    ->required()->minLength(3)->maxLength(100),
                Forms\Components\Toggle::make('is_active')->label(__('validation.attributes.status')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_ar')->label(__('validation.attributes.name_ar'))->searchable()->sortable(),
                Tables\Columns\TextColumn::make('name_en')->label(__('validation.attributes.name_ar'))->searchable()->sortable(),
                Tables\Columns\TextColumn::make('admin.name')->label(__('keywords.created_by'))->searchable()->sortable(),
                Tables\Columns\IconColumn::make('is_active')->label(__('validation.attributes.status'))
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('is_active')
                    ->options([
                        true => __('keywords.active'),
                        false => __('keywords.dis_active'),
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    // public static function getNavigationIcon(): ?string
    // {
    //     return 'heroicon-o-user-group';
    // }


    public static function getModelLabel(): string
    {
        return __('resources.tag');
    }

    public static function getPluralModelLabel(): string
    {
        return __('resources.tags');
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
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
            'view' => Pages\ViewTag::route('/{record}')
        ];
    }
}
