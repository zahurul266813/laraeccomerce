@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session(('message'))}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Add Slider
                    <a href="{{url('admin/sliders')}}" class="text-white btn btn-warning btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/sliders/store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control"/>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label><br>
                        <input type="checkbox" name="status" style="width:20px;height:20px;" /> Checked=Hidden; Unchecked=Visible;
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Add Slider</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
