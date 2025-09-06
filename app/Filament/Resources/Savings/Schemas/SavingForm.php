<?php

namespace App\Filament\Resources\Savings\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;

class SavingForm
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
                Hidden::make('amount')
                    ->default(0),
                Select::make('type')
                    ->options(['money' => 'Money', 'gold' => 'Gold'])
                    ->default('money')
                    ->required(),
                Textarea::make('description')
                    ->label('Keterangan')
                    ->columnSpanFull(),
            ]);
    }
}
