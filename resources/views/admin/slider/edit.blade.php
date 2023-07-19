@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session(('message'))}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Edit Slider
                    <a href="{{url('admin/sliders')}}" class="text-white btn btn-warning btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/sliders/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" value="{{$slider->title}}" class="form-control" name="title" >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{$slider->description}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control"/>
                        <img src="{{asset($slider->image)}}" class="my-3" style="width: 80px;height:50px" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label><br>
                        <input type="checkbox" name="status" style="width:20px;height:20px;"  {{$slider->status=='1'?'checked':''}} /> Checked=Hidden; Unchecked=Visible;
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Update Slider</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
