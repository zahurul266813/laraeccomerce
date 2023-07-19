@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Products
                    <a href="{{url('admin/products')}}" class="text-white btn btn-danger btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/product/store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

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
                          <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">Product Color</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade p-3 bordered  show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option class="form-control" value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="brand">Brand</label>
                                    <select name="brand" class="form-control">
                                        @foreach ($brands as $brand)
                                            <option class="form-control" value="{{$brand->name}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="small_description" class="form-label">Small Description</label>
                                    <textarea name="small_description" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade p-3 bordered " id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="meta_title" class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="meta_description" class="form-label">Meta Description</label>
                                    <textarea name="meta_description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade p-3 bordered " id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="original_price" class="form-label">Original Price</label>
                                            <input type="number" name="original_price" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="selling_price" class="form-label">Selling Price</label>
                                            <input type="number" name="selling_price" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" name="quantity" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="trending" class="form-label">Trending</label>
                                            <input type="checkbox" name="trending" style="width:25px;height:25px;">
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <input type="checkbox" name="status" style="width:25px;height:25px;">
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade p-3 bordered " id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="image">Upload Images</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>
                            </div>
                            <div class="tab-pane fade p-3 bordered " id="color-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">

                                <div class="mb-3">


                                    <div class="row">
                                        <label>Select Color</label>
                                        <hr/>
                                        @forelse ($colors as $coloritem)
                                        <div class="col-md-3">
                                            <div class="p-2 border mb-3">
                                                Color : <input type="checkbox" name="colors[{{$coloritem->id}}]" value="{{$coloritem->id}}" /> {{$coloritem->name}}
                                                <br/>
                                                Quantity : <input type="number" name="color_quantity[{{$coloritem->id}}]" style="width:70px;border: 1px solid;">
                                            </div>
                                        </div>
                                        @empty
                                            <div class="col-md-12">
                                                <h3>No Color Found!</h3>
                                            </div>
                                        @endforelse

                                    </div>
                                </div>
                            </div>
                      </div>
                      <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                      </div>
                </form>



            </div>
        </div>
    </div>
</div>
@endsection
