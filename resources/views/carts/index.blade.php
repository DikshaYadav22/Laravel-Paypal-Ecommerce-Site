@extends('layouts.app')

@section('content')
    <table class="table table-secondary table-striped">
        <thead class="bg-dark">
            <tr class="text-white">
                <td>Prdouct name</td>
                <td>Product image</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Sub Total</td>
                <td>Remove</td>
            </tr>
        </thead>
        @foreach($items as $item)
        <tr>
            
                <td>{{$item->name}}</td>
                <td><img src="{{asset('storage/'.$item->model->image)}}" width="150"></td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->model->price}}</td>
                <td>{{($item->quantity) * ($item->model->price)}}</td>
                <td>
                    <form action="{{route('carts.destroy', $item->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
           
        @endforeach
            <tr>
                <td colspan="6"><strong class="float-right">Total: {{Cart::getTotal()}}</strong></td>
            </tr>
        </table>
    <div id="paypal-button-container"></div>
    @section('scripts')
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                amount: {
                    value: "{{Cart::getTotal()}}",
                    
                }
                }]
            });
            },
     
            onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
       window.location = 'http://localhost:8000/checkout'
      });
    }
  }).render('#paypal-button-container');  
  </script>
    @endsection
@endsection


