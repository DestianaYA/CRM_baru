<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Balance;

class BalanceComposer
{
    protected $balance;

    public function __construct(Balance $balance)
    {
        $this->balance = $balance;
    }

    public function compose(View $view)
    {
        $view->with('balance', $this->balance->all());
    }
}
