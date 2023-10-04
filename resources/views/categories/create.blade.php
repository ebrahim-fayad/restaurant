@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            @include('inc.side')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h1 class="text-center text-capitalize ">add new category</h1>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="name" class="form-control mb-3 text-capitalize"
                                placeholder="category name">
                            @error('name')
                                {{--  <h2>{{ $message }}</h2>  --}}
                                <script>
                                    swal({
                                        title: "category name",
                                        text: "{{ $message }}",
                                        type: "warning",
                                        timer:1500
                                    });
                                </script>
                            @enderror
                            <input type="file" name="image" class="form-control mb-3 text-capitalize">
                             @error('image')
                                {{--  <h2>{{ $message }}</h2>  --}}
                                <script>
                                    swal({
                                        title: "category image",
                                        text: "{{ $message }}",
                                        type: "warning",
                                        timer:1500
                                    });
                                </script>
                            @enderror
                            <button type="submit" class="btn btn-primary form-control">Add New Category</button>
                        </form>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- col-md-8  -->
        </div><!-- row -->
    </div><!-- containear -->
@endsection
