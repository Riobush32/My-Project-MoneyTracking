<?php

namespace App\Models;

use App\Models\Debs;
use App\Models\User;
use App\Models\MyWish;
use App\Models\Saving;
use App\Models\Wallet;
use App\Models\BudgetSetting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function budget_setting(): BelongsTo
    {
        return $this->belongsTo(BudgetSetting::class);
    }

    public function to_wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'to_wallet_id');
    }

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }

    public function from_wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'from_wallet_id');
    }

    public function my_wish(): BelongsTo
    {
        return $this->belongsTo(MyWish::class);
    }

    public function my_saving(): BelongsTo
    {
        return $this->belongsTo(Saving::class, 'saving_id');
    }

    public function debs(): BelongsTo
    {
        return $this->belongsTo(Debs::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
