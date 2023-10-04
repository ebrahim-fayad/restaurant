@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            @include('inc.side')
            <div class="col-md-9">
                <div class="card">
                    <h2 class="bg-danger text-white text-center text-capitalize">create new meal</h2>
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul style="list-style: none">
                                @foreach ($errors->all() as $error)
                                    <li>
                                        <h4 class="text-center">{{ $error }}</h4>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form action="{{ route('meals.store') }}" method="post" class="p-2" enctype="multipart/form-data">
                        @csrf

                        <div class=" mb-3">
                            <label class="form-label"> Name Of Meal </label>
                            <input type="text" class="form-control form-control-lg" name="title"
                                placeholder="title Of Meal">
                                @error('title')
                                    <h2>{{ $message }}</h2>
                                @enderror
                        </div> <!-- name -->
                        <div class=" mb-3">
                            <label class="form-label"> Category Of Meal </label>
                            <select class="form-control form-control-lg form-select" name="category_id">
                                <option>Select Category</option>
                                @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div> <!-- categories -->
                        <div class=" mb-3">
                            <label class="form-label"> Description Of Meal </label>
                            <textarea class="form-control form-control-lg" name="description" rows="5" placeholder="description Of Meal"></textarea>
                        </div> <!-- description -->


                        <div class="mb-3">
                            <label class="form-label"> Meals Price($) </label>
                        </div>


                        <div class="row g-4 mb-3">

                            <div class="col-auto">
                                <input type="number" class="form-control form-control-lg" name="s_price"
                                    placeholder="small meal price">
                            </div>

                            <div class="col-auto">
                                <input type="number" class="form-control form-control-lg" name="m_price"
                                    placeholder="medium meal price">
                            </div>

                            <div class="col-auto">
                                <input type="number" class="form-control form-control-lg" name="l_price"
                                    placeholder="large meal price">
                            </div>

                        </div> <!-- in line prices -->






                        <div class=" mb-3">
                            <label class="form-label">Image Of Meal </label>
                            <input type="file" class="form-control form-control-lg" name="image">
                        </div> <!-- image -->


                        <div class=" mb-3 text-center">
                            <button type="submit" class="btn btn-danger btn-lg w-100 ">Add Meal</button>
                        </div> <!-- button -->


                    </form>
                </div><!-- card-2 -->
            </div><!-- col-md-9 -->
        </div><!-- row -->
    </div><!-- containear -->
@endsection



