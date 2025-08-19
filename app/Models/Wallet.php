<?php

namespace App\Models;

use App\Models\Debs;
use App\Models\User;
use App\Models\Budget;
use App\Models\MyWish;
use App\Models\Saving;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /////////////////////////////////////

    public function budgets(): HasMany
    {
        return $this->hasMany(Budget::class);
    }


    public function savings(): HasMany
    {
        return $this->hasMany(Saving::class);
    }

    public function debs(): HasMany
    {
        return $this->hasMany(Debs::class);
    }

    public function my_wish(): HasMany
    {
        return $this->hasMany(MyWish::class);
    }

    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
