<div>
@include('livewire.admin.brand.modal-form')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Brand List
                    <a href="#" class="btn btn-primary float-end btn-sm"  data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brand</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>slug</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand)
                            <tr>
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->slug}}</td>
                                <td>
                                    @if ($brand->category)
                                    {{$brand->category->name}}
                                    @else
                                        No Category
                                    @endif
                                </td>
                                <td>{{$brand->status == 1?'Hidden':'Visible'}}</td>
                                <td>
                                    <a href="#" wire:click="editBrand({{$brand->id}})"  data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-success btn-sm">Edit</a>
                                    <a href="#"  wire:click="deleteBrand({{$brand->id}})"  data-bs-toggle="modal" data-bs-target="#deleteBrandModal"  class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr colspan="5">No Record Found</tr>
                        @endforelse

                    </tbody>
                </table>
                {{$brands->links()}}
            </div>
        </div>
    </div>
</div>
</div>
@push('script')
 <script>
    window.addEventListener('close-modal',event=>{
        $('#addBrandModal').modal('hide');
        $('#updateBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    });
 </script>
@endpush
