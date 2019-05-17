@extends('master')
@section('title','')
@section('content')
    @if(Session::has('success'))
        <div class="alert-success">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="container">
        <div class="col-12">
            <h1 class="btn-outline-info">Danh sách sản phẩm</h1>
            <table class=" table table-striped">
                <a href="{{route('products.create')}}"><button class="btn btn-outline-primary" type="button">Thêm sản phẩm</button></a>
                <div class="form-group">
                    <tr>
                       <th scope="col">STT</th>
                       <th scope="col">Tên sản phẩm</th>
                       <th scope="col">Mô tả</th>
                       <th scope="col">Giá</th>
                       <th scope="col">Giá cũ</th>
                       <th scope="col">Ảnh</th>
                       <th scope="col">Thao tác</th>
                    </tr>
                    @foreach($products as $key=>$product)
                        <tr>
                            <th>{{++$key}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->price_old}}</td>
                            <td><img src="{{asset('storage/'.$product->image)}}" style="width:150px"/></td>
                            <td>
                                <a href="{{route('products.delete',['id'=>$product->id])}}"><button type="button" class="btn btn-outline-primary" onclick="return confirm('Bạn có muốn xóa sản phẩm {{$product->name}} ? ')">Xóa</button></a>
                                <a><button type="button" class="btn btn-outline-primary">Cập nhật</button></a>
                                <a href="{{route('carts.create',['id'=>$product->id])}}">
                                    <button type="button" class="btn btn-outline-primary">Thêm vào giỏ hàng</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                </div>
            </table>

        </div>

    </div>
    @endsection