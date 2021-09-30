<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderPage extends Component
{
    public $orders, $sl=1;

    public function mount(){
        $this->orders = Order::all();
    }

    public function render()
    {
        return view('livewire.order-page');
    }
}
