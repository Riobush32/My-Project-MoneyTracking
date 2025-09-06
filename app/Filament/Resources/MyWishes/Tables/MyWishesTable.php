<?php

namespace App\Filament\Resources\MyWishes\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MyWishesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('wallet.name')
                    ->label('Di simpan di Wallet')
                    ->searchable(),
                TextColumn::make('item_name')
                    ->label('Nama Barang')
                    ->searchable(),
                TextColumn::make('estimated_price')
                    ->label('Perkiraan Harga')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('your_saving')
                    ->label('Tabungan Anda')
                    ->numeric()
                    ->prefix('Rp ')
                    ->sortable(),
                TextColumn::make('purchase_date')
                    ->label('Taget')
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
