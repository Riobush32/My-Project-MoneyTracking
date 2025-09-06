<?php

namespace App\Filament\Resources\BudgetSettings\Pages;

use App\Filament\Resources\BudgetSettings\BudgetSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBudgetSetting extends EditRecord
{
    protected static string $resource = BudgetSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
