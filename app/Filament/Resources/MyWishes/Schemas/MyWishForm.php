<?php

namespace App\Filament\Resources\MyWishes\Schemas;

use Filament\Schemas\Schema;
use App\Forms\Components\MoneyInput;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Coolsam\Flatpickr\Forms\Components\Flatpickr;

class MyWishForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(Auth::user()->id),
                Select::make('wallet_id')
                    ->label('Disimpan di Wallet')
                    ->relationship('wallet', 'name'),
                TextInput::make('item_name')
                    ->label('Nama Barang')
                    ->required(),
                MoneyInput::make('estimated_price')
                    ->label('Perkiraan Harga')
                    ->required(),
                Flatpickr::make('purchase_date')
                    ->label('Taget tanggal pembelian'),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'purchased' => 'Purchased', 'cancelled' => 'Cancelled'])
                    ->default('pending')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
