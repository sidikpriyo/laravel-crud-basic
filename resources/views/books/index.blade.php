<!doctype html>
<html lang="en">

@include('templates.head')

<body>

    {{-- navbar --}}
    @include('templates.navbar')
    {{-- content --}}
    <div class="row">
        <div class="container">
            <h1 class="text-center text-uppercase">books</h1>
        </div>
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
                        <div class=" float-right">
                            <a href="{{ route('books.create') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Tambah
                            </a>
                        </div>
                        <h4 class="text-uppercase">Books</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-lg">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Book Name</th>
                                    <th>Category</th>
                                    <th>Total</th>
                                    <th width="20%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $item)
                                    <tr>
                                        <td>
                                            {{ ($data->currentpage() - 1) * $data->perpage() + $index + 1 }}
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            @foreach ($item->categories as $i)
                                                <li>{{ $i->name }}</li>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $item->total }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('books.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                                Edit</a>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('books.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">
                                                    <i class="fas fa-trash-alt"></i>
                                                    Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- end content --}}

    {{-- js file --}}\
    @include('templates.filejs')
    {{-- end --}}


    {{-- modal delete --}}
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Body
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal delete --}}
</body>

</html>
