<div>
    @section('title')
        Order - Shop Admin
    @endsection

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 card">
                    <div class="col-12 card-body">
                      <h5 class="card-title">Delivery Information</h5>
                      <p class="text-dark">Name: Rifat Hasan</p>
                      <p class="text-dark">Number: {{$order->phone}}</p>
                      <p class="text-dark">Address: {{$order->address}}</p>
                      <p class="text-dark">{{$order->upazilla}}, {{$order->district}}</p>
                    </div>
                </div>
                <div class="col-md-6 card">
                    <div class="col-12 card-body">
                      <h5 class="card-title">Invoice ID: #{{$order->invoice}}</h5>
                      <p class="text-dark"> Date: {{$order->created_at}}</p>
                      <p class="text-dark">Payment type: 
                        @if($order->Payment->payment_type==='cod')
                        <p class="badge badge-default">Cash on delivery</p>
                        @elseif($order->Payment->payment_type==='bkash')
                        <span class="badge badge-default">Bkash</span>
                        @elseif($order->Payment->payment_type==='nagad')
                        <span class="badge badge-default">Nagad</span>
                        @else
                        <span class="badge badge-default">Card</span>
                        @endif
                        </p>
                      <p class="text-dark">Payment status: 
                          @if($order->Payment->payment_status==0)
                          <span class="badge badge-warning">Unpaid</span>
                          <button wire:click="paymentUpdate" class="ml-2 btn btn-dark">Update to paid</button>
                          @else
                          <span class="badge badge-success">Paid</span>
                          @endif
                    </p>
                    <p class="text-dark">Amount Paid: ${{$order->Payment->amount}}

                  </p>
                     
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 card">
                    <div class="col-12 card-body"><p class="text-dark">Order status: <br>
                        @if($order->order_status===0)
                          <button class="btn btn-sm btn-primary mr-4">Pending</button>
                          <button wire:click="incrementStatus({{$order->order_status}})" class="btn mr-4 btn-sm btn-outline-dark btn-default">Confirmed</button>
                          <button wire:click="cancelOrder" class="btn btn-sm btn-outline-danger">Cancel order</button>
                        @elseif($order->order_status===1)
                          <button class="btn btn-sm btn-primary mr-4">Pending</button>
                          <button class="btn btn-sm btn-primary mr-4">Confirmed</button>
                          <button wire:click="incrementStatus({{$order->order_status}})" class="btn btn-sm btn-outline-dark btn-default">Processing</button>
                        @elseif($order->order_status===2)
                          <button class="btn btn-sm btn-primary mr-4">Pending</button>
                          <button class="btn btn-sm btn-primary mr-4">Confirmed</button>
                          <button class="btn btn-sm btn-primary mr-4">Processing</button>
                          <button wire:click="incrementStatus({{$order->order_status}})" class="btn btn-sm btn-outline-dark btn-default">Picked</button>
                        @elseif($order->order_status===3)
                        <button class="btn btn-sm btn-primary mr-4">Pending</button>
                        <button class="btn btn-sm btn-primary mr-4">Confirmed</button>
                        <button class="btn btn-sm btn-primary mr-4">Processing</button>
                        <button class="btn btn-sm btn-primary mr-4">Picked</button>
                        <button wire:click="incrementStatus({{$order->order_status}})" class="btn btn-sm btn-outline-dark btn-default">Delivered</button>
                        @elseif($order->order_status===4)
                        <button class="btn btn-sm btn-primary mr-4">Pending</button>
                        <button class="btn btn-sm btn-primary mr-4">Confirmed</button>
                        <button class="btn btn-sm btn-primary mr-4">Processing</button>
                        <button class="btn btn-sm btn-primary mr-4">Picked</button>
                        <button class="btn btn-sm btn-success">Delivered</button>
                        @else
                            <button class="btn btn-sm btn-outline-danger disabled mt-2">Order canceled</button>
                        @endif
                      </p>
                    </div>
                </div>
            </div>
            <div class="row card">
                <div class="col-md-12">
                    <table class="table mt-4 table-borderless">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $item)
                            <tr>
                                <td>
                                    <figure class="itemside align-items-center">
                                        <div class="aside text-dark">
                                            <img style="height: 80px" src="https://image.freepik.com/free-vector/mysterious-mafia-man-smoking-cigarette_52683-34828.jpg" class="img-sm">
                                            Product Name
                                        </div>
                                        {{-- <figcaption class="info"> <a href="#" class="title text-dark" data-abc="true">
                                            Tshirt with round nect</a>
                                        </figcaption> --}}
                                    </figure>
                                </td>
                                <td class="text-dark">
                                    {{$item->qty}}
                                </td>
                                <td class="text-dark">
                                    <div class="price-wrap">${{$item->price}}</div>
                                </td>
                                <td class="text-dark">${{$item->price*$item->qty}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-11 justify-content-right">
                    <h4 class="p-4 text-dark float-right">TOTAL: ${{$order->total}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
