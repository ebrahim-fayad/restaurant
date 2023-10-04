@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            @include('inc.side')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h1 class="text-center text-capitalize ">all categories</h1>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <script>
                                swal({
                                        title: "category name",
                                        text: "{{ session('success')}}",
                                        type: "success",
                                        timer:1500
                                    });
                            </script>
                        @endif
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td><img src="{{ Storage::url($category->image) }}" width="100" alt=""></td>
                                    <td><a href="{{ route('categories.edit',$category->id) }}" class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="{{ route('categories.destroy',$category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- col-md-8  -->
        </div><!-- row -->
    </div><!-- containear -->
@endsection
