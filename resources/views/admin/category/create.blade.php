@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Category
                    <a href="{{url('admin/category')}}" class="text-white btn btn-primary btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                
                <form action="{{url('admin/category/store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control">
                            @error('name') <small class="alert alert-danger">{{$message}}</small>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control">
                            @error('slug') <small class="alert alert-danger">{{$message}}</small>@enderror

                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea rows="3" name="description" class="form-control"></textarea>
                            @error('description') <small class="alert alert-danger">{{$message}}</small>@enderror

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Upload Image</label>
                            <input type="file" name="image" class="form-control">
                            @error('image') <small class="alert alert-danger">{{$message}}</small>@enderror

                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label">Status</label><br>
                            <input type="checkbox" name="status">
                            

                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <h4>SEO Tags</h4>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control">
                            @error('meta_title') <small class="alert alert-danger">{{$message}}</small>@enderror

                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_keyword" class="form-label">Meta Keyword</label>
                            <textarea rows="3" name="meta_keyword" class="form-control"></textarea>
                            @error('meta_keyword') <small class="alert alert-danger">{{$message}}</small>@enderror

                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea rows="3" name="meta_description" class="form-control"></textarea>
                            @error('meta_description') <small class="alert alert-danger">{{$message}}</small>@enderror

                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary float-end text-white">Save</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection