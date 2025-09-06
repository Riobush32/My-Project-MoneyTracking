<?php

namespace App\Filament\Resources\Debs;

use App\Filament\Resources\Debs\Pages\CreateDebs;
use App\Filament\Resources\Debs\Pages\EditDebs;
use App\Filament\Resources\Debs\Pages\ListDebs;
use App\Filament\Resources\Debs\Schemas\DebsForm;
use App\Filament\Resources\Debs\Tables\DebsTable;
use App\Models\Debs;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DebsResource extends Resource
{
    protected static ?string $model = Debs::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Debs';
    protected static ?int $navigationSort = 3;


    public static function form(Schema $schema): Schema
    {
        return DebsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DebsTable::configure($table);
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
            'index' => ListDebs::route('/'),
            'create' => CreateDebs::route('/create'),
            'edit' => EditDebs::route('/{record}/edit'),
        ];
    }
}
