@extends('admin.layout.master')
@section('title', 'Danh mục')
@section('content')
<div class="page-content">
    <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Danh sách sản phẩm</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm sản phẩm mới</a>
        <a href="{{ route('product.trashed') }}" class="btn btn-danger mb-3">Xem sản phẩm đã bị xóa</a>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Trạng thái</th>
                <th>Liên kết truy cập</th>
                <th>Liên kết câu hỏi</th>
                <th>Liên kết đặt cược</th>
                <th>Liên kết tải xuống</th>
                <th>Liên kết giá cả</th>
                <th>Liên kết đánh giá</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $index => $product)
            <tr>
                <td>{{ $index +1}}</td>
                <td>
                    <img src="{{ asset('storage/' . $product->thumbnail) }}" alt=""  width="70px" height="70px">
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? 'N/A' }}</td>
                <td>{{ $product->status }}</td>
                <td>
                    @if($product->link_access)
                        <a href="{{ $product->link_access }}" target="_blank">Xem</a>
                    @endif
                </td>
                <td>
                    @if($product->link_faq)
                        <a href="{{ $product->link_faq }}" target="_blank">Xem</a>
                    @endif
                </td>
                <td>
                    @if($product->link_call)
                        <a href="{{ $product->link_call }}" target="_blank">Xem</a>
                    @endif
                </td>
                <td>
                    @if($product->link_download)
                        <a href="{{ $product->link_download }}" target="_blank">Xem</a>
                    @endif
                </td>
                <td>
                    @if($product->link_pricing)
                        <a href="{{ $product->link_pricing }}" target="_blank">Xem</a>
                    @endif
                </td>
                <td>
                    @if($product->link_review)
                        <a href="{{ $product->link_review }}" target="_blank">Xem</a>
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-primary">Sửa</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}
    </div>
</div>
@endsection