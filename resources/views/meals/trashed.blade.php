@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            @include('inc.side')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h1 class="text-center text-capitalize ">all trashed meals</h1>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <script>
                                swal({
                                        title: "meal name",
                                        text: "{{ session('success')}}",
                                        type: "success",
                                        timer:1500
                                    });
                            </script>
                        @endif
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr class="text-capitalize">
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>s_price</th>
                                    <th>m_price</th>
                                    <th>l_price</th>
                                    <th>restore</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meals as $key => $meal)
                                    
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $meal->category->name }}</td>
                                    <td><img src="{{ $meal->image }}" width="100" alt=""></td>
                                    <td>{{ $meal->s_price }}</td>
                                    <td>{{ $meal->m_price }}</td>
                                    <td>{{ $meal->l_price }}</td>
                                    <td><a href="{{ route('meals.restore',$meal->id) }}" class="btn btn-warning">Restore</a></td>
                                    <td>
                                        <form action="{{ route('meals.hardDelete',$meal->id) }}" method="post">
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
