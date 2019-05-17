@extends('master')
@section('title','')
@section('content')
    <div class="container">
        <div class="col-12">
            <h1 style="text-align: center" class="btn-outline-primary">Thêm sản phẩm</h1>
            <form action="{{route('products.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
                </div>

                <div class="form-group">
                    <label>Mô tả</label>
                    <input type="text" class="form-control" name="description" placeholder="Nhập mô tả">
                </div>

                <div class="form-group">
                    <label>Giá bán</label>
                    <input type="text" class="form-control" name="price" placeholder="Nhập giá bán">
                </div>

                <div class="form-group">
                    <label>Giá cũ</label>
                    <input type="text" class="form-control" name="price_old" placeholder="Nhập giá cũ">
                </div>

                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div>
                    <button type="submit" class="btn btn-outline-primary">CREATE</button>
                    <a href="{{route('products.index')}}">
                        <button type="button" class="btn btn-outline-secondary">BACK LIST</button>
                    </a>
                </div>

            </form>
        </div>

    </div>

@endsection
