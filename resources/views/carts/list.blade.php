@extends('master')
@section('title','')
@section('content')
    @if(Session::has('success'))
        <div class="alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    @if(Session::has('cart'))
        totalQty = {{$carts->totalQty}} <br>
        totalPrice = {{$carts->totalPrice}} <br>
        <table class="table" style="">
            <thead>
            <tr style=" background: greenyellow ;">
                <th style="text-align: center" scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            @foreach($carts->items as $key=>$product)
                <form action="{{route('carts.update',['id'=>$product['item']->id])}}" method="post">
                    @csrf
                    <tbody>
                    <tr style="">
                        <th scope="row">
                            <div style="text-align: center;color: #2176bd">
                                <h3>
                                    {{$product['item']->name}}

                                </h3>
                                <div>
                                    <img src="{{asset('storage/'.$product['item']->image)}}" style="width: 150px"/>
                                </div>
                            </div>

                        </th>
                        <th scope="col">
                            {{$product['item']->price}}
                        </th>
                        <th scope="col">
                            <input type="number" name="quantity" min="1" value="{{$product['qty']}}">
                        </th>
                        <th scope="col">
                            {{$product['price']}}
                        </th>
                        <th>
                            <button type="submit" class=" btn btn-outline-primary">UPDATE</button>

                            <a href="{{route('carts.delete', ['id'=>$product['item']->id])}}">
                                <button type="button" class="btn btn-outline-danger"
                                        onclick="return confirm('do you want remove product {{$product['item']->name}}?')">
                                    DELETE
                                </button>

                            </a>
                        </th>

                    </tr>

                    </tbody>
                </form>

            @endforeach
            <tr>
                <th></th>
                <th></th>
                <th>Total Quantity : {{$carts->totalQty}}</th>
                <th>Total Price : {{$carts->totalPrice}}</th>
                <th></th>
            </tr>
            @else
                <p>giỏ hàng đang trống</p>
            @endif
        </table>

@endsection()