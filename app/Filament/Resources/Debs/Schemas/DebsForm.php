<?php

namespace App\Filament\Resources\Debs\Schemas;

use Filament\Schemas\Schema;
use App\Forms\Components\MoneyInput;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Coolsam\Flatpickr\Forms\Components\Flatpickr;

class DebsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('user_id')
                    ->default(Auth::user()->id),
                Select::make('wallet_id')
                    ->label('Wallet')
                    ->relationship('wallet', 'name')
                    ->required(),
                TextInput::make('partner_name')
                    ->label('Nama Peminjam/Pemberi Pinjaman')
                    ->required(),
                MoneyInput::make('amount')
                    ->label('Jumlah')
                    ->required(),
                Select::make('type')
                    ->options(['debt' => 'Debt', 'receivable' => 'Receivable'])
                    ->default('debt')
                    ->required(),
                Flatpickr::make('start_date'),
                Flatpickr::make('due_date'),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'paid' => 'Paid', 'overdue' => 'Overdue'])
                    ->default('pending')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
