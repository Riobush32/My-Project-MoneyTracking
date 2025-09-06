<?php

namespace App\Forms\Components;

use Filament\Forms\Components\TextInput;

class MoneyInput extends TextInput
{
  protected function setUp(): void
  {
    parent::setUp();

    $this->reactive()
      ->required()
      ->prefix('Rp ')
      ->formatStateUsing(
        fn($state) => $state !== null
          ? number_format((int) $state, 0, ',', '.')
          : null
      )
      ->dehydrateStateUsing(
        fn($state) => $state !== null
          ? str_replace('.', '', $state) // simpan sebagai angka murni
          : null
      )
      ->afterStateUpdated(function ($state, callable $set) {
        if ($state !== null) {
          // Ambil hanya digit angka (hapus huruf/simbol apapun)
          $numeric = preg_replace('/\D/', '', $state);

          // Kalau kosong, fallback ke 0
          $numeric = $numeric === '' ? 0 : $numeric;

          // Set kembali dalam format ribuan
          $set($this->getName(), number_format($numeric, 0, ',', '.'));
        }
      });
  }
}
