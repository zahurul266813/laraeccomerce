@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session(('message'))}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Update Colors
                    <a href="{{url('admin/colors')}}" class="text-white btn btn-warning btn-sm float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{url('admin/colors/'.$color->id.'/update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Color Name</label>
                        <input type="text" class="form-control" value="{{$color->name}}" name="name" >
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Color Code</label>
                        <input type="text" class="form-control" value="{{$color->code}}" name="code" >
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Color Status</label><br>
                        <input type="checkbox" name="status" style="width:20px;height:20px;" {{$color->status == true?'checked':''}}/> Checked=Hidden; Unchecked=Visible;
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
