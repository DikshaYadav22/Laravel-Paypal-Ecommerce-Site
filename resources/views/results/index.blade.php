@extends('layouts.app')
@section('content')
   <div class="card">
        <div class="card-header">
            <h3 class="text-center text-capitalize">Record System</h3>
            <div class="d-flex justify-between">
                <div><a href="{{route('results.create')}}" class="btn btn-info">Add Records</a></div>
                <div><a href="{{route('products.create')}}" class="btn btn-info">Add Products</a></div>
                <div><a href="#" class="btn btn-info">Add Categories</a></div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody>
                    
                    @foreach($results as $result)
                        <tr>
                            <td>{{ $result->name }}</td>
                            <td>{{ $result->phone }}</td>
                            <td>{{ $result->address }}</td>
                            <td><a href="{{route('results.edit',$result->id)}}" class="btn btn-info">Edit</a></td>
                            <td>
                                <form action="{{route('results.destroy', $result->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                   
                </tbody> 
            </table>
        </div>
   </div> 
@endsection

