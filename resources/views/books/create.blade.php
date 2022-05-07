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
                <div class="card">
                    <div class="card-header">
                        <div class=" float-right">
                        </div>
                        <h4 class="text-uppercase">Create Books</h4>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" class="bg-white shadow-sm p-3"
                            action="{{ route('books.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Book Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" placeholder="insert book name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Total</label>
                                        <input type="number" class="form-control @error('total') is-invalid @enderror"
                                            name="total" value="{{ old('total') }}" placeholder="insert total">
                                        @error('total')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Select Category</label>
                                    @foreach ($category as $item)
                                        <div class="form-check">
                                            <input id="my-input"
                                                class="form-check-input @error('total') is-invalid @enderror"
                                                type="checkbox" name="category[]" value="{{ $item->id }}">
                                            <label for="my-input" class="form-check-label">{{ $item->name }}</label>
                                        </div>
                                    @endforeach
                                    @error('category[]')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
