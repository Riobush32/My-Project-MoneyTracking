<?php

namespace App\Filament\Resources\MyWishes\Pages;

use App\Filament\Resources\MyWishes\MyWishResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMyWish extends CreateRecord
{
    protected static string $resource = MyWishResource::class;
}
