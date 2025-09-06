<?php

namespace App\Filament\Resources\BudgetSettings\Schemas;

use Filament\Schemas\Schema;
use App\Forms\Components\MoneyInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Coolsam\Flatpickr\Forms\Components\Flatpickr;
use Filament\Forms\Components\TextInput;

class BudgetSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('budget_id')
                    ->label('Budget')
                    ->relationship('budget', 'name')
                    ->required(),

                MoneyInput::make('amount')
                    ->label('Amount')
                    ->required(),

            Flatpickr::make('date_range')
                ->label('Date Range')
                ->required()
                ->rangePicker()
                ->dehydrated(false) // penting: jangan simpan date_range ke kolom DB
                ->afterStateUpdated(function ($state, callable $set) {
                    if (is_string($state) && str_contains($state, ' to ')) {
                        [$start, $end] = explode(' to ', $state);
                        $set('start_date', trim($start));
                        $set('end_date', trim($end));
                    }
                })
                ->afterStateHydrated(function ($state, callable $set, $record) {
                    if ($record && $record->start_date && $record->end_date) {
                        $set('date_range', $record->start_date . ' to ' . $record->end_date);
                    }
                }),
                Hidden::make('start_date')
                    ->required(),
                Hidden::make('end_date')
                    ->required(),
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive'
                    ])
                    ->required(),
            ]);
    }
}
