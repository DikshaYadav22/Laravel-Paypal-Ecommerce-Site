<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>Thank you for shopping with us...</p>

    <table class="table table-bordered">
        @foreach(Cart::getContent() as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td><img src="{{asset('storage/'.$item->model->image)}}" width="150px"></td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->size}}</td>
                <td>{{$item->model->price}}</td>
            </tr>
            
        @endforeach
        <tr>
                <td>Total: {{Cart::getTotal()}}</td>
            </tr>
    </table>
</body>
</html>