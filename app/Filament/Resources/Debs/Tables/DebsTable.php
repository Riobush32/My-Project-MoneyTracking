<?php

namespace App\Filament\Resources\Debs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DebsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('wallet.name')
                    ->label('Wallet')
                    ->searchable(),
                TextColumn::make('partner_name')
                    ->label('Nama Peminjam/Pemberi Pinjaman')
                    ->searchable(),
                TextColumn::make('amount')
                    ->label('Jumlah')
                    ->numeric()
                    ->prefix('Rp ')
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Tipe')
                    ->sortable(),
                TextColumn::make('start_date')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('due_date')
                    ->label('Jatuh Tempo')
                    ->date()
                    ->sortable(),
                TextColumn::make('status'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
