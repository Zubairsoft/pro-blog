<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        $local= app()->currentLocale();
        return $form
            ->schema([
                Forms\Components\TextInput::make('title_ar')->label(__('validation.attributes.title_ar'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('title_en')->label(__('validation.attributes.title_en'))
                    ->maxLength(255),
                Forms\Components\Textarea::make('description_ar')->label(__('validation.attributes.description_ar'))
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description_en')->label(__('validation.attributes.description_en'))
                    ->maxLength(65535)
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('poster')->maxFiles(2 * 1024)
                    ->collection('poster'),
                SpatieMediaLibraryFileUpload::make('images')->multiple()->maxFiles(2 * 1024)
                    ->collection('post-images'),
                Forms\Components\Select::make('tags')->multiple()
                    ->options(Tag::query()->select(['id', 'name_' . app()->currentLocale()])
                        ->where('is_active', true)->pluck('name_' . app()->currentLocale(), 'id')->toArray())->required(),
                Forms\Components\Toggle::make('is_publish_ar')->label(__('validation.attributes.is_publish_ar'))
                    ->required(),
                Forms\Components\Toggle::make('is_publish_en')->label(__('validation.attributes.is_publish_en'))
                    ->required(),
                Forms\Components\Toggle::make('status')->label(__('validation.attributes.status'))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('authorable.name')->label(__('keywords.created_by'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_ar')->label(__('validation.attributes.title_ar'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('title_en')->label(__('validation.attributes.title_en'))
                    ->searchable(),
                    Tables\Columns\TextColumn::make('tags.name_'.app()->currentLocale())->label(__('resources.tags'))
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_publish_ar')->label(__('validation.attributes.is_publish_ar'))
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_publish_en')->label(__('validation.attributes.is_publish_en'))
                    ->boolean(),
                Tables\Columns\IconColumn::make('status')->label(__('validation.attributes.status'))
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getModelLabel(): string
    {
        return __('resources.posts');
    }


    public static function getPluralModelLabel(): string
    {
        return __('resources.posts');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
