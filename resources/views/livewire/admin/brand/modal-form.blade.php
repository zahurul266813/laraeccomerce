<!--  Add Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brand</h1>
          <button type="button"  wire:click='closeModal'  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="saveBrand">

            <div class="modal-body">
                <div class="mb-3">
                    {{-- <label for="name">--Select Category--</label> --}}
                    <select wire:model.defer='category_id' class="form-control">
                        <option value="0"> -- Select Category -- </option>
                        @foreach ($categories as $cateItem)
                            <option value="{{$cateItem->id}}">{{$cateItem->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                    <label for="name">Enter Name</label>
                    <input type="text" wire:model.defer='name' class="form-control">
                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" wire:model.defer='slug' class="form-control">
                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                </div>
                <div class="mb-3">
                    <label for="status">Status</label><br>
                    <input type="checkbox" wire:model.defer='status'> checked = Hidden /Unchecked = Visible
                    @error('name') <small class="text-danger">{{$message}}</small> @enderror
                </div>
            </div>
            <div class="modal-footer">
            <button type="button"  wire:click='closeModal'  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>

      </div>
    </div>
  </div>


  <!--  Update Modal -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brand</h1>
          <button type="button"  wire:click='closeModal'  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div wire:loading class="p-2">
            <div class="spinner-border text-warning" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>Loading...
        </div>
        <div wire:loading.remove>

            <form wire:submit.prevent="updateBrand">

                <div class="modal-body">
                    <div class="mb-3">
                        <select wire:model.defer='category_id' class="form-control">
                            <option value="0"> -- Select Category -- </option>
                            @foreach ($categories as $cateItem)
                                <option value="{{$cateItem->id}}">{{$cateItem->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name">Enter Name</label>
                        <input type="text" wire:model.defer='name' class="form-control">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" wire:model.defer='slug' class="form-control">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label><br>
                        <input type="checkbox" wire:model.defer='status' style="width=70px;height=70px"/> checked = Hidden /Unchecked = Visible
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" wire:click='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>

   <!--  Delete Modal -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Brand</h1>
          <button type="button"  wire:click='closeModal'  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div wire:loading class="p-2">
            <div class="spinner-border text-warning" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>Loading...
        </div>
        <div wire:loading.remove>

            <form wire:submit.prevent="destroyBrand">

                <div class="modal-body">
                    <strong>Sure You want to delete it?</strong>
                </div>
                <div class="modal-footer">
                <button type="button" wire:click='closeModal' class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Yes, Delete</button>
                </div>
            </form>
        </div>

      </div>
    </div>
  </div>

