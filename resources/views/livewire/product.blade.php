<div>
    @section('title')
        Product - Shop Admin
    @endsection

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Product Add</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form wire:submit.prevent="addProduct">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Product Name</label>
                                            <input wire:model="productName" type="text" class="form-control" placeholder="Product Name">
                                            @error('productName') <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="col-sm-4 mt-2 mt-sm-0">
                                            <label>Category</label>
                                            <select wire:ignore.self  class="form-control" wire:model="categoryId">
                                                <option>Select category</option>
                                                @foreach($categorys as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('productName') <span class="error text-danger">The category is required</span> @enderror
                                        </div>
                                        <div class="col-sm-4 mt-2 mt-sm-0">
                                            <label>SKU</label>
                                            <input wire:model="sku" type="text" class="form-control" placeholder="SKU">
                                            @error('productName') <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label>Image</label>
                                            <input wire:model="image" type="file" class="form-control" />
                                            @error('image') <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label>Regular Price</label>
                                            <input wire:model="regularPrice" type="number" class="form-control" placeholder="Price">
                                            @error('regularPrice') <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label>Discount Price</label>
                                            <input wire:model="price" type="number" class="form-control" placeholder="Price">
                                            @error('price') <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <label>Stock </label>
                                            <input wire:model="stock" type="number" class="form-control" value="0">
                                            @error('stock') <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <label>Description</label>
                                            <textarea wire:model="description" class="form-control"></textarea>
                                            @error('description') <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="mt-2" >
                                        <button class="btn btn-dark">Add Product</button>
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
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>SKU</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $item)
                                        <tr>
                                            <td>{{$sl++}}</td>
                                            <td>{{$item->productName}}</td>
                                            <td><img src="/storage/{{$item->image}}" style="height:75px;" class="img-fluid"/></td>
                                            <td>{{$item->Category->name}}</td>
                                            <td>{{$item->sku}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>{{$item->stock}}</td>

                                            <td>
                                                <button wire:click="selectSingleProduct({{ $item->id }})" data-toggle="modal" data-target="#view" class="btn btn-warning btn-sm m-1"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                <button wire:click="selectSingleProduct({{ $item->id }})" data-toggle="modal" data-target="#edit" class="btn btn-info btn-sm m-1"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                <button wire:click="selectSingleProduct({{$item->id}})" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>SKU</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div wire:ignore.self class="modal fade" id="view">
                <div class="modal-dialog modal-g">
                  <div class="modal-content">
                    <div class="modal-header bg-dark">
                      <h4 class="modal-title text-light">View Product</h4>
                      <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <table class="table table-responsive-sm">
                        <tr>
                            <th>Product Name :</th>
                            <td>{{$selectproductName}}</td>
                        </tr>
                        <tr>
                            <th>Category :</th>
                            <td>{{$selectcategory}}</td>
                        </tr>
                        <tr>
                            <th>SKU :</th>
                            <td>{{$selectsku}}</td>
                        </tr>
                        <tr>
                            <th>Image :</th>
                            <td><img src="/storage/{{$selectimage}}" style="height: 55px" /></td>
                        </tr>
                        <tr>
                            <th>Regular Price :</th>
                            <td>{{$selectregularPrice}}</td>
                        </tr>
                        <tr>
                            <th>Price :</th>
                            <td>{{$selectprice}}</td>
                        </tr>
                        <tr>
                            <th>Stock :</th>
                            <td>{{$selectstock}}</td>
                        </tr>
                        <tr>
                            <th>Description :</th>
                            <td>{{$selectdescription}}</td>
                        </tr>
                        
                      </table>
                    </div>
                    <div class="modal-footer bg-gradient-light justify-content-between">
                      <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                      
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->

              <div wire:ignore.self class="modal fade" id="edit">
                <form wire:submit.prevent="updateProduct">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header bg-dark">
                      <h4 class="modal-title text-light">View Product</h4>
                      <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <table class="table table-responsive-sm">
                        <tr>
                            <th>Product Name :</th>
                            <td><input type="text" class="form-control" wire:model="selectproductName" /></td>
                        </tr>
                        <tr>
                            <th>Category :</th>
                            <td>
                                <select wire:model="selectcategoryId" class="form-control">
                                    @foreach($categorys as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>SKU :</th>
                            <td><input type="text" class="form-control" wire:model="selectsku" /></td>
                        </tr>
                        <tr>
                            <th>Image :</th>
                            <td><img src="/storage/{{$selectimage}}" style="height: 55px" /></td>
                            <td><input type="file" class="form-control" wire:model="selectnewImage" /></td>
                        </tr>
                        <tr>
                            <th>Regular Price :</th>
                            <td><input type="number" class="form-control" wire:model="selectregularPrice" /></td>
                        </tr>
                        <tr>
                            <th>Price :</th>
                            <td><input type="number" class="form-control" wire:model="selectprice" /></td>
                        </tr>
                        <tr>
                            <th>Stock :</th>
                            <td><input type="number" class="form-control" wire:model="selectstock" /></td>
                        </tr>
                        <tr>
                            <th>Description :</th>
                            <td>
                                <textarea wire:model="selectdescription" class="form-control">{{$selectdescription}}</textarea>
                            </td>
                        </tr>
                        
                      </table>
                    </div>
                    <div class="modal-footer bg-gradient-light justify-content-between">
                      <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                      <div wire:loading>
                        <button type="button" disabled class="btn btn-dark">Processing</button>
                      </div>
                      <div wire:loading.remove>
                        <button type="submit" class="btn btn-info">Save changes</button>
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
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-body text-center mt-5 mb-4">
                        <h3>Are you sure?</h3>
                    </div>
                    <div class="modal-footer bg-gradient-light justify-content-between">
                      <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                      
                      <div>
                        <button type="submit" wire:click="deleteProduct()" data-dismiss="modal" class="btn btn-danger">Delete</button>
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
