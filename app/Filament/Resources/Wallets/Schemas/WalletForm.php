<?php

namespace App\Filament\Resources\Wallets\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use App\Forms\Components\MoneyInput;

class WalletForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(Auth::user()->id),
                TextInput::make('name')
                    ->label("Nama Wallet")
                    ->required(),
                MoneyInput::make('amount')
                    ->label('Amount'),
                Select::make('type')
                    ->options(['cash' => 'Cash', 'e-wallet' => 'E wallet', 'bank' => 'Bank'])
                    ->default('cash')
                    ->required(),
                Textarea::make('desciption')
                    ->columnSpanFull(),
            MoneyInput::make('adminfee')
                    ->label('Admin Fee'),
                Select::make('status')
                    ->options(['active' => 'Active', 'inactive' => 'Inactive'])
                    ->default('active')
                    ->required(),
            ]);
    }
}
