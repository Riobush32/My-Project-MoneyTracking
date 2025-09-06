<?php

namespace App\Filament\Resources\MyWishes;

use BackedEnum;
use App\Models\MyWish;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Enums\NavigationGroup;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\MyWishes\Pages\EditMyWish;
use App\Filament\Resources\MyWishes\Pages\CreateMyWish;
use App\Filament\Resources\MyWishes\Pages\ListMyWishes;
use App\Filament\Resources\MyWishes\Schemas\MyWishForm;
use App\Filament\Resources\MyWishes\Tables\MyWishesTable;

class MyWishResource extends Resource
{
    protected static ?string $model = MyWish::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'My Wishes';

    protected static string | \UnitEnum | null $navigationGroup = NavigationGroup::SavingsManagement;


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
