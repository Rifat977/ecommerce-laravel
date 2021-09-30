<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentDetail;

class SingleOrder extends Component
{

    public $page_id, $order, $products;

    
    public function incrementStatus($value){
        $item = Order::find($this->page_id);
        $item->order_status = $value+1;
        $item->save();
        $this->mount($this->page_id);
    }

    public function paymentUpdate(){
        $item = PaymentDetail::find($this->page_id);
        $item->payment_status = 1;
        $item->save();
        $this->mount($this->page_id);
    }

    public function cancelOrder(){
        $item = Order::find($this->page_id);
        $item->order_status = 5;
        $item->save();
        $this->mount($this->page_id);
    }

    public function mount($page_id){
        $this->page_id = $page_id;
        $this->order = Order::find($page_id);
        $this->products = OrderItem::where('invoice',$this->order->invoice)->get();
    }
    public function render()
    {
        return view('livewire.single-order');
    }
}
