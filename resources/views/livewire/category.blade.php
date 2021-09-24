<div>
    @section('title')
        Category - Shop Admin
    @endsection

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-xxl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Category Add</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form wire:submit.prevent="addCategory">
                                    <div class="form-group">
                                        <input wire:model="name" type="text" class="form-control" placeholder="category name">
                                        @error('name') <span class="error text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Category List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table wire:ignore.self id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categorys as $item)
                                        <tr>
                                            <td>{{$sl++}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                <button wire:click="selectCategory({{ $item->id }})" data-toggle="modal" data-target="#edit" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                <button wire:click="selectCategory({{ $item->id }})" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
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