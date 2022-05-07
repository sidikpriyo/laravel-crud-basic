<!doctype html>
<html lang="en">

@include('templates.head')

<body>

    {{-- navbar --}}
    @include('templates.navbar')
    {{-- content --}}
    <div class="row">
        <div class="container">
            <h1 class="text-center text-uppercase">Categories</h1>
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
                            <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Tambah
                            </a>
                        </div>
                        <h4 class="text-uppercase">Categories</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-lg">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th width="20%" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $item)
                                    <tr>
                                        <td>
                                            {{ ($categories->currentpage() - 1) * $categories->perpage() + $index + 1 }}
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                                Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- end content --}}

    {{-- js file --}}\
    @include('templates.filejs')
    {{-- end --}}

</body>

</html>
