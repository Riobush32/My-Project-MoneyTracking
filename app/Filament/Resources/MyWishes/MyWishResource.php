<?php

namespace App\Filament\Resources\MyWishes;

use App\Filament\Resources\MyWishes\Pages\CreateMyWish;
use App\Filament\Resources\MyWishes\Pages\EditMyWish;
use App\Filament\Resources\MyWishes\Pages\ListMyWishes;
use App\Filament\Resources\MyWishes\Schemas\MyWishForm;
use App\Filament\Resources\MyWishes\Tables\MyWishesTable;
use App\Models\MyWish;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MyWishResource extends Resource
{
    protected static ?string $model = MyWish::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'My Wishes';

    public static function form(Schema $schema): Schema
    {
        return MyWishForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MyWishesTable::configure($table);
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
            'index' => ListMyWishes::route('/'),
            'create' => CreateMyWish::route('/create'),
            'edit' => EditMyWish::route('/{record}/edit'),
        ];
    }
}
