<div class="container">
    <div class="content">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h5 class="text-uppercase">Create</h5>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Name</label>
                            <input class="form-control" type="text" wire:model.defer='name' placeholder="Insert name">
                            @error('name')
                                <span class="text text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Email</label>
                            <input class="form-control" type="text" wire:model.defer='email'
                                placeholder="Insert email">
                            @error('email')
                                <span class="text text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Password</label>
                            <input class="form-control" type="password" wire:model.defer='password'
                                placeholder="Insert Password">
                            @error('password')
                                <span class="text text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Confirm Password</label>
                            <input class="form-control" type="password" wire:model.defer='confirmPassword'
                                placeholder="Insert Confirm Password">
                            @error('confirmPassword')
                                <span class="text text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button wire:click.prevent='create' class="btn btn-success btn-sm">Save</button>
                <button wire:click='resetValue' class="btn btn-danger btn-sm">Reset</button>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-header">
                <h4 class="text-uppercase">User</h4>
            </div>
            <div class="card-body">
                <table class="table table-responsive-lg">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th width="20%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($user as $index=> $item)
                            <tr>
                                <td>
                                    {{ ($user->currentpage() - 1) * $user->perpage() + $index + 1 }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->email }}
                                </td>
                                <td class="text-center">
                                    <button wire:click='edit({{ $item->id }})' class="btn btn-warning btn-sm"
                                        type="button" data-toggle="modal" data-target="#modelId">
                                        <i class="fas fa-edit    "></i>
                                        Edit</button>
                                    <button wire:click='delete({{ $item->id }})' class="btn btn-danger btn-sm"
                                        type="button" data-toggle="modal" data-target="#modalDelete">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>not found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $user->links() }}
            </div>
        </div>
    </div>
    {{-- modal edit --}}
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" wire:model.defer='Editname'>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click='resetValue' class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button wire:click.prevent='update' type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- modal delete --}}
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modalDelete" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin hapus {{ $Editname }}
                </div>
                <div class="modal-footer">
                    <button wire:click.prevent='resetValue' type="button" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button wire:click.prevent='destroy' type="button" class="btn btn-primary">Hapus</button>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            document.addEventListener('livewire:load', function() {
                Livewire.on('update', () => {
                    $('#modelId').modal('hide');
                })
                Livewire.on('delete', () => {
                    $('#modalDelete').modal('hide');
                })
            })
        </script>
    @endpush
</div>
