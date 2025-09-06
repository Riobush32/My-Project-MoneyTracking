<?php

namespace App\Filament\Resources\BudgetSettings\Pages;

use App\Filament\Resources\BudgetSettings\BudgetSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBudgetSettings extends ListRecords
{
    protected static string $resource = BudgetSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
