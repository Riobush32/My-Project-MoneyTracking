<?php

namespace App\Filament\Resources\Debs\Pages;

use App\Filament\Resources\Debs\DebsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDebs extends EditRecord
{
    protected static string $resource = DebsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
