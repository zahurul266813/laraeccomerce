@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session(('message'))}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Sliders
                    <a href="{{url('admin/sliders/create')}}" class="text-white btn btn-primary btn-sm float-end">Add Slider</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                        <tr>
                            <td>{{$slider->id}}</td>
                            <td>{{$slider->title}}</td>
                            <td>{{$slider->description}}</td>
                            <td>
                                <img src="{{asset($slider->image)}}" alt="slider" style="width:100px;height:80px">
                            </td>
                            <td>{{$slider->status == '1'?'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{url("admin/sliders/".$slider->id."/edit")}}" class="btn btn-primary btn-sm ">Edit</a>
                                <a href="{{url("admin/sliders/".$slider->id."/delete")}}" onclick="return confirm('Are you Sure, you want to Delete this Slider??')" class="btn btn-danger btn-sm ">Delete</a>
                            </td>
                        </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
