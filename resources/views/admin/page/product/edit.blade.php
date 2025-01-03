@extends('admin.layout.master')
@section('title', 'Danh mục')
@section('content')
<div class="page-content">
    <div class="container-fluid">
    <h2>Chỉnh sửa sản phẩm</h2>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="video_demo">Video Demo</label>
            @if($product->video_demo)
                <div class="mb-2">
                    <div class="card" style="width: 320px;">
                        <div class="card-body">
                            <video width="100%" controls>
                                <source src="{{ Storage::url($product->video_demo) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
            @endif
            <input type="file" 
                   class="form-control-file @error('video_demo') is-invalid @enderror" 
                   id="video_demo" 
                   name="video_demo"
                   accept="video/mp4,video/mov,video/avi">
            @error('video_demo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Hỗ trợ định dạng: MP4, MOV, AVI. Kích thước tối đa: 20MB</small>
        </div>

        <div class="form-group">
            <label for="thumbnail">Ảnh đại diện</label>
            @if($product->thumbnail)
                <div class="mb-2">
                    <div class="card" style="width: 200px;">
                        <div class="card-body">
                            <img src="{{ Storage::url($product->thumbnail) }}" class="img-fluid rounded" alt="Current thumbnail">
                        </div>
                    </div>
                </div>
            @endif
            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
        </div>

        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                <option value="">Chọn danh mục</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select class="form-control" id="status" name="status">
                <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label for="link_access">Liên kết truy cập</label>
            <input type="url" class="form-control @error('link_access') is-invalid @enderror" id="link_access" name="link_access" value="{{ old('link_access', $product->link_access) }}">
            @error('link_access')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="link_faq">Liên kết câu hỏi</label>
            <input type="url" class="form-control @error('link_faq') is-invalid @enderror" id="link_faq" name="link_faq" value="{{ old('link_faq', $product->link_faq) }}">
            @error('link_faq')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="link_call">Liên kết đặt cược</label>
            <input type="url" class="form-control @error('link_call') is-invalid @enderror" id="link_call" name="link_call" value="{{ old('link_call', $product->link_call) }}">
            @error('link_call')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="link_download">Liên kết tải xuống</label>
            <input type="url" class="form-control @error('link_download') is-invalid @enderror" id="link_download" name="link_download" value="{{ old('link_download', $product->link_download) }}">
            @error('link_download')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="link_pricing">Liên kết giá cả</label>
            <input type="url" class="form-control @error('link_pricing') is-invalid @enderror" id="link_pricing" name="link_pricing" value="{{ old('link_pricing', $product->link_pricing) }}">
            @error('link_pricing')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="link_review">Liên kết đánh giá</label>
            <input type="url" class="form-control @error('link_review') is-invalid @enderror" id="link_review" name="link_review" value="{{ old('link_review', $product->link_review) }}">
            @error('link_review')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
    </div>
</div>
@endsection