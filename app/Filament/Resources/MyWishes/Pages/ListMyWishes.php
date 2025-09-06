<?php

namespace App\Filament\Resources\MyWishes\Pages;

use App\Filament\Resources\MyWishes\MyWishResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMyWishes extends ListRecords
{
    protected static string $resource = MyWishResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
