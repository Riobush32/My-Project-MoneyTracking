<?php

namespace App\Filament\Resources\MyWishes\Pages;

use App\Filament\Resources\MyWishes\MyWishResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMyWish extends EditRecord
{
    protected static string $resource = MyWishResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
