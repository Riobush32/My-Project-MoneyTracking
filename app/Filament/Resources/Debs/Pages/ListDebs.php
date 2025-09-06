<?php

namespace App\Filament\Resources\Debs\Pages;

use App\Filament\Resources\Debs\DebsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDebs extends ListRecords
{
    protected static string $resource = DebsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
