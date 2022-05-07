<!doctype html>
<html lang="en">

@include('templates.head')

<body>

    {{-- navbar --}}
    @include('templates.navbar')
    {{-- content --}}
    <div class="row">
        <div class="container">
            <h1 class="text-center text-uppercase">User</h1>
        </div>
        @livewire('user')
    </div>


    {{-- end content --}}

    {{-- js file --}}\
    @include('templates.filejs')
    {{-- end --}}


</body>

</html>
