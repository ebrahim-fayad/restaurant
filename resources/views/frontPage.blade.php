@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h3 class="text-center text-capitalize ">all categories</h3>
                    </div><!-- card-header -->
                     <div class="card-body">

                       <div class="list-group text-capitalize">
                        <form action="{{ route('frontPage') }}" method="get">

                          @foreach ($categories as $category)
                          <button type="submit" value="{{ $category->id }}" name="category_id" class="btn btn-primary form-control mb-3">{{ $category->name }}</button>
                          @endforeach
                        </form>
                       </div>
                     </div>
                </div><!-- card -->
            </div><!-- col-md-3 -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h1 class="text-center text-capitalize ">all meals</h1>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <script>
                                swal({
                                    title: "meal name",
                                    text: "{{ session('success') }}",
                                    type: "success",
                                    timer: 1500
                                });
                            </script>
                        @endif
                        <div class="row">
                          @foreach ($meals as $meal)
                              
                          <div class="col-md-4">
                            <img src="{{ Storage::url($meal->image) }}" class="w-100" alt="">
                            <h3>{{ $meal->title }}</h3>
                          </div>
                          @endforeach
                        </div>
                    </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- col-md-8  -->
        </div><!-- row -->
    </div><!-- containear -->
@endsection
