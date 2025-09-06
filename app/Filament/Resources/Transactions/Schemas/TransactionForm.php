<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Schemas\Schema;
use App\Models\BudgetSetting;
use App\Forms\Components\MoneyInput;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Fieldset;
use Coolsam\Flatpickr\Forms\Components\Flatpickr;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(Auth::user()->id),
                Select::make('type')
                    ->options([
                        'income' => 'Income',
                        'expense' => 'Expense',
                        'savings' => 'Savings',
                        'my wish' => 'My wish',
                        'debs' => 'Debs',
                        'receivable' => 'Receivable',
                        'alocation' => 'Alocation',
                    ])
                    ->default('income')
                    ->required()
                    ->reactive(),
                TextInput::make('name')
                    ->label('Nama Transaksi'),
                Flatpickr::make('transaction_date')
                    ->default(now()),
                ///////////////////////////////////////////////////////////////
                Fieldset::make('Expanse Details')
                    ->schema([
                        Select::make('budget_setting_id')
                            ->label('Dari Budget')
                            ->options(
                                BudgetSetting::with('budget')
                                    ->get()
                                    ->pluck('budget.name', 'id')
                            )
                            ->reactive()
                            ->afterStateUpdated(function ($set, $state) {
                                // ambil wallet dari budget terkait
                                $walletId = BudgetSetting::with('budget.wallet')->find($state)?->budget?->wallet_id;
                                $set('from_wallet_id', $walletId);
                            }),
                        Select::make('from_wallet_id')
                            ->label('Dari Wallet')
                            ->relationship('from_wallet', 'name'),
                        MoneyInput::make('amount')
                            ->label('Jumlah Pengeluaran')
                            ->required(),
                        Select::make('category_id')
                            ->relationship('category', 'name'),
                    ])
                    ->visible(fn($get) => $get('type') === 'expense')
                    ->columnSpanFull(),
                ///////////////////////////////////////////////////////////////
                Fieldset::make('Income Details')
                    ->schema([
                        Select::make('to_wallet_id')
                            ->label('Ke Wallet')
                            ->relationship('to_wallet', 'name'),
                        MoneyInput::make('amount')
                            ->label('Jumlah Pemasukan')
                            ->required(),
                    ])
                    ->visible(fn($get) => $get('type') === 'income')
                    ->columnSpanFull(),
                ///////////////////////////////////////////////////////////////
                Fieldset::make('Saving Details')
                    ->schema([
                        Select::make('saving_id')
                            ->relationship('my_saving', 'description'),
                        MoneyInput::make('amount')
                            ->label('Jumlah')
                            ->required(),
                    ])
                    ->visible(fn($get) => $get('type') === 'savings')
                    ->columnSpanFull(),
                ///////////////////////////////////////////////////////////////
                Fieldset::make('My Wish Details')
                    ->schema([
                        Select::make('my_wish_id')
                            ->relationship('my_wish', 'item_name'),
                        MoneyInput::make('amount')
                            ->label('Jumlah')
                            ->required(),
                    ])
                    ->visible(fn($get) => $get('type') === 'my wish')
                    ->columnSpanFull(),
                ///////////////////////////////////////////////////////////////
                Fieldset::make('Debs Details')
                    ->schema([
                        Select::make('debs_id')
                            ->relationship('debs', 'partner_name', function ($query) {
                                $query->where('type', 'debs'); // contoh filter
                            }),
                        MoneyInput::make('amount')
                            ->label('Jumlah')
                            ->required(),
                    ])
                    ->visible(fn($get) => $get('type') === 'debs')
                    ->columnSpanFull(),
                ///////////////////////////////////////////////////////////////
                Fieldset::make('Receivable Details')
                    ->schema([
                        Select::make('debs_id')
                            ->relationship('debs', 'partner_name', function ($query) {
                                $query->where('type', 'receivable'); // contoh filter
                            }),
                        MoneyInput::make('amount')
                            ->label('Jumlah')
                            ->required(),
                    ])
                    ->visible(fn($get) => $get('type') === 'receivable')
                    ->columnSpanFull(),
                ///////////////////////////////////////////////////////////////
                Fieldset::make('Alocation Details')
                    ->schema([
                        Select::make('from_wallet_id')
                            ->label('Dari Wallet')
                            ->relationship('from_wallet', 'name'),
                        Select::make('to_wallet_id')
                            ->label('Ke Wallet')
                            ->relationship('to_wallet', 'name'),
                        MoneyInput::make('amount')
                            ->label('Jumlah')
                            ->required(),
                    ])
                    ->visible(fn($get) => $get('type') === 'alocation')
                    ->columnSpanFull(),
                ///////////////////////////////////////////////////////////////

                Textarea::make('description')
                    ->columnSpanFull(),

            ]);
    }
}
