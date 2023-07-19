@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Update Products
                    <a href="{{url('admin/products')}}" class="text-white btn btn-danger btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/products/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                    @endif
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">SEO Tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Product Images</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">Product Color</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade p-3 bordered  show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option class="form-control" value="{{$category->id}}" {{$category->id == $product->category_id?'selected':''}}>
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" value="{{$product->name}}" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" value="{{$product->slug}}"  class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="brand">Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option class="form-control" value="{{$brand->name}}" {{$brand->name == $product->brand ?'selected':''}}>
                                                {{$brand->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="small_description" class="form-label">Small Description</label>
                                    <textarea name="small_description" class="form-control">{{$product->small_description}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" class="form-control">{{$product->description}}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade p-3 bordered " id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" value="{{$product->meta_title}}">
                                </div>
                                <div class="mb-3">
                                    <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control">{{$product->meta_keyword}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea name="meta_description" class="form-control">{{$product->meta_description}}</textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade p-3 bordered " id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="original_price" class="form-label">Original Price</label>
                                            <input type="number" name="original_price" value="{{$product->original_price}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="selling_price" class="form-label">Selling Price</label>
                                            <input type="number" name="selling_price" value="{{$product->selling_price}}"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" name="quantity" value="{{$product->quantity}}"  class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="trending" class="form-label">Trending</label>
                                            <input type="checkbox" name="trending" {{$product->trending =='1'?'checked':''}} style="width:25px;height:25px;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <input type="checkbox" name="status" {{$product->status =='1'?'checked':''}}  style="width:25px;height:25px;">
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <div class="tab-pane fade p-3 bordered " id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="image">Upload Images</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>
                                <div>
                                    @if ($product->productImages)
                                    <div class="row">
                                    @foreach ($product->productImages as $image)
                                            <div class="col-md-2">
                                                <img src="{{asset($image->image)}}" class="me-4 border" alt="product-img" style="width:80px;height:80px;">
                                                <a href="{{url('admin/product-image/'.$image->id.'/destroy')}}" class="btn btn-warning btn-sm text-white">Remove</a>
                                            </div>
                                    @endforeach
                                    </div>


                                    @else
                                    No Images Added
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade p-3 bordered " id="color-tab-pane" role="tabpanel" >
                                <div class="mb-3">
                                    <div class="row">
                                        <h4>Add New Color</h4>
                                        <label>Select Color</label>
                                        <hr/>
                                        @foreach ($colors as $coloritem)
                                        <div class="col-md-3">
                                            <div class="p-2 border mb-3">
                                                Color : <input type="checkbox" name="colors[{{$coloritem->id}}]" value="{{$coloritem->id}}" /> {{$coloritem->name}}
                                                <br/>
                                                Quantity : <input type="number" name="color_quantity[{{$coloritem->id}}]" style="width:70px;border: 1px solid;">
                                            </div>
                                        </div>

                                        @endforeach

                                    </div>

                                    <div class="">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Color Name</th>
                                                    <th>Quantity</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($product->productColors as $prodColor)
                                                <tr class="prod_color_tr">
                                                    <td>
                                                        @if ($prodColor->color)
                                                            {{$prodColor->color->name}}
                                                        @else
                                                            No Color Found
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="input-group" style="width:150px">
                                                            <input type="text" class="productColorQuantity form-control form-control-sm" value="{{$prodColor->color_quantity}}">
                                                            <button type="button" class="updateColorQuantityBtn btn btn-primary btn-sm" value="{{$prodColor->id}}">Update</button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                            <button type="button" id="" class="deleteColorQuantityBtn btn btn-danger btn-sm" value="{{$prodColor->id}}">Delete</button>

                                                    </td>
                                                </tr>
                                                @empty
                                                No Color Found
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                      </div>
                </form>



            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')


<script>
$(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on("click",".updateColorQuantityBtn", function(){


                var product_id = "{{ $product->id }}";
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.prod_color_tr').find('.productColorQuantity').val();



                if(qty <= 0 ) {
                    alert('Product Quantity Required');
                    return false;
                }

                var data = {
                    'product_id':product_id,
                    'qty':qty,

                };




                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/"+prod_color_id,
                    data: data,

                    success: function(response){

                        alert(response.message);
                    }
                });
        });

        $(document).on("click",".deleteColorQuantityBtn", function(){



                var prod_color_id = $(this).val();
                var thisClick = $(this);

                $.ajax({
                    type: "GET",
                    url: "/admin/product-color/"+prod_color_id+"/delete",

                    success: function(response){
                        thisClick.closest('.prod_color_tr').remove();
                        alert(response.message);
                    }
                });
                });




});





</script>



@endsection
