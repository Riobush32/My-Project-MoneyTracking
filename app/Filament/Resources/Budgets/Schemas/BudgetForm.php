<?php

namespace App\Filament\Resources\Budgets\Schemas;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class BudgetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(Auth::user()->id),
                Select::make('wallet_id')
                    ->label('Wallet')
                    ->required()
                    ->relationship(name: 'wallet', titleAttribute: 'name'),
                TextInput::make('name')
                    ->label("Nama Budget")
                    ->required(),
            ]);
    }
}
