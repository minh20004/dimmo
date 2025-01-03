@extends('admin.layout.master')
@section('title', 'Thùng rác sản phẩm')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Thùng rác sản phẩm</h2>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form tìm kiếm -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('product.trashed') }}" method="GET" class="row g-3">
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control" 
                               placeholder="Tìm kiếm theo tên sản phẩm..." 
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Ngày xóa</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($product->thumbnail)
                            <img src="{{ asset('storage/' . $product->thumbnail) }}" 
                                 alt="" width="70px" height="70px">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td>{{ $product->deleted_at->format('d/m/Y H:i:s') }}</td>
                    <td>
                        <form action="{{ route('product.restore', $product->id) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">
                                Khôi phục
                            </button>
                        </form>
                        {{-- <form action="{{ route('products.force-delete', $product->id) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Bạn có chắc muốn xóa vĩnh viễn?')">
                                Xóa vĩnh viễn
                            </button>
                        </form> --}}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Không có sản phẩm nào trong thùng rác</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $products->links() }}
    </div>
</div>
@endsection 