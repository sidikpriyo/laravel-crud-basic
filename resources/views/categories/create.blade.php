<!doctype html>
<html lang="en">

@include('templates.head')

<body>

    {{-- navbar --}}
    @include('templates.navbar')
    {{-- content --}}
    <div class="row">
        <div class="container">
            <h1 class="text-center text-uppercase">Category</h1>
        </div>
        <div class="container">
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <div class=" float-right">
                        </div>
                        <h4 class="text-uppercase">Create Category</h4>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
                            action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" placeholder="insert category name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                        </form>
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
