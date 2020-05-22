@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="d-flex bg-dark justify-content-between">
            <div class="card-header"><h5 class="text-white">Categories</h5></div>
            <div><a href=" {{route('categories.create')}} " class="btn bg-white btn-sm my-3 mx-3">Add Categories</a></div>
        </div>
    </div>
        <div class="card">
        <div class="card-body">
            <table class="table table-secondary text-center">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td><img src=" {{asset('storage/'. $category->image)}} " width="150" alt="no image found"></td>
                        <td>
                            <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection