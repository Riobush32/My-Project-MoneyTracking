<?php

namespace App\Models;

use App\Models\Budget;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BudgetSetting extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function budget(): BelongsTo
    {
        return $this->belongsTo(Budget::class);
    }

    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
