@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{session(('message'))}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Colors
                    <a href="{{url('admin/colors/create')}}" class="text-white btn btn-primary btn-sm float-end">Add Color</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-dark">
                    <thead>

                            <th>SL</th>
                            <th>Name</th>
                            <th>Color Code</th>
                            <th>Status</th>
                            <th>Action</th>


                    </thead>
                    <tbody>
                        @forelse ($colors as $key=> $color)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$color->name}}</td>
                                <td>{{$color->code}}</td>
                                <td>{{$color->status == '1'?'Hidden':'Visible'}}</td>
                                <td>
                                    <a href="{{url('admin/colors/'.$color->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{url('admin/colors/'.$color->id.'/delete')}}" onclick="return confirm('Are You Sure you want to delete this data???')" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @empty
                           <tr>
                                <td colspan="5">No Color Found</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
