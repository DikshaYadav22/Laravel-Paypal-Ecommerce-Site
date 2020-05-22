@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header bg-dark"><h6 class="text-white">Add Products</h6></div>
        <div class="card-body">
            <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description">
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price">
                </div>
                
                <div class="form-group">
                    <label for="category">Category</label>
                    
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id  }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary" type="submit">Add</button>
            </form>
        </div>
    </div>

@endsection