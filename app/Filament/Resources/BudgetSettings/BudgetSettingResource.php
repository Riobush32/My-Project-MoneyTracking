<?php

namespace App\Filament\Resources\BudgetSettings;

use BackedEnum;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use App\Models\BudgetSetting;
use App\Enums\NavigationGroup;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use App\Filament\Resources\BudgetSettings\Pages\EditBudgetSetting;
use App\Filament\Resources\BudgetSettings\Pages\ListBudgetSettings;
use App\Filament\Resources\BudgetSettings\Pages\CreateBudgetSetting;
use App\Filament\Resources\BudgetSettings\Schemas\BudgetSettingForm;
use App\Filament\Resources\BudgetSettings\Tables\BudgetSettingsTable;

class BudgetSettingResource extends Resource
{
    protected static ?string $model = BudgetSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Budget Setting';
    protected static string | \UnitEnum | null $navigationGroup = NavigationGroup::Settings;


    public static function form(Schema $schema): Schema
    {
        return BudgetSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BudgetSettingsTable::configure($table);
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
            'index' => ListBudgetSettings::route('/'),
            'create' => CreateBudgetSetting::route('/create'),
            'edit' => EditBudgetSetting::route('/{record}/edit'),
        ];
    }
}
