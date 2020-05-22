@extends('layouts.app')
@section('content')
  <form action="{{isset($result)?route('results.update', $result->id): route('results.store')}}" method="POST">
    @csrf
    @if(isset($result))
      @method('PUT')
    @endif 
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{isset($result)?$result->name:' '}}" placeholder="Enter your name...">
      </div>
      <div class="form-group">
        <label for="inputEmail4">Phone</label>
        <input type="number" name="phone" class="form-control" value="{{isset($result)?$result->phone:' '}}" id="inputEmail4" placeholder="Enter your phone no..">
      </div>
      <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" name="address" value="{{isset($result)?$result->address:' '}}" class="form-control" id="inputAddress" placeholder="Enter your address">
      </div>
      <div class="form-group">
        <label for="inputCity">City</label>
        <input type="text"  name="city" class="form-control" value="{{isset($result)?$result->city:' '}}" id="inputCity">
      </div>
      <div class="form-group">
        <label for="inputState">State</label>
        <select id="inputState" name="state" value="{{isset($result)?$result->state:' '}}" class="form-control">
          <option selected>Choose State</option>
          <option>Uttarakhand</option>
          <option>Odisha</option>
          <option>Delhi</option>
          <option>Himachal Prades</option>
        </select>
      </div>
      <div class="form-group">
        <label for="inputZip">Zip</label>
        <input type="text" name="zip"  value="{{isset($result)?$result->zip:' '}}" class="form-control" id="inputZip">
      </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary ml-2">Submit</button>
    </div>
  </form>
@endsection