<div>
    @section('title')
        Orders - Shop Admin
    @endsection

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Order List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table wire:ignore.self id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Invoice</th>
                                            <th>Payment status</th>
                                            <th>Order status</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $item)
                                            <td class="text-dark">{{$sl++}}</td>
                                            <td class="text-dark"><img class="img-fluid" style="height:42px; weight:35px" src="https://image.freepik.com/free-vector/mysterious-mafia-man-smoking-cigarette_52683-34828.jpg" />
                                                {{$item->Customer->name}}
                                            </td>
                                            <td class="text-dark">{{$item->phone}}</td>
                                            <td class="text-dark">{{$item->invoice}}</td>
                                            <td class="text-dark">
                                                @if($item->Payment->payment_status===0)
                                                <span class="badge badge-danger">Unpaid</span>
                                                @else
                                                <span class="badge badge-success">Paid</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->order_status===0)
                                                <span class="badge badge-warning">Pendig</span>
                                                @elseif($item->order_status===1)
                                                <span class="badge badge-primary">Confirmed</span>
                                                @elseif($item->order_status===2)
                                                <span class="badge badge-info">Processing</span>
                                                @elseif($item->order_status===3)
                                                <span class="badge badge-secondary">Picked</span>
                                                @elseif($item->order_status===4)
                                                <span class="badge badge-success">Delivered</span>
                                                @elseif($item->order_status===5)
                                                <span class="badge badge-danger">Canceled</span>
                                                @endif
                                            </td>
                                            <td class="text-dark">${{$item->total}}</td>
                                            <td>
                                                <a href="{{route('single-order', ['page_id'=>$item->id])}}" class="btn btn-dark btn-sm ">
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Invoice</th>
                                            <th>Payment status</th>
                                            <th>Order status</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div wire:ignore.self class="modal fade" id="edit">
                <form wire:submit.prevent="updateCategory">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-dark">
                      <h4 class="modal-title text-light">Edit Category</h4>
                      <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <label>Category Name</label>
                        <input wire:model="editName" type="text" class="form-control" />
                    </div>
                    <div class="modal-footer bg-gradient-light justify-content-between">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      <div wire:loading>
                        <button type="button" disabled class="btn btn-dark">Processing</button>
                      </div>
                      <div wire:loading.remove>
                        <button type="submit" class="btn btn-dark">Save changes</button>
                      </div>
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </form>
              </div>
              <!-- /.modal -->

              <div wire:ignore.self class="modal fade" id="delete">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header bg-dark">
                      <h4 class="modal-title text-light">Are you sure?</h4>
                      <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer bg-gradient-light justify-content-between">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                      
                      <div>
                        <button type="submit" wire:click="deleteCategory()" data-dismiss="modal" class="btn btn-danger">Delete</button>
                      </div>
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

        </div>
    </div>
</div>