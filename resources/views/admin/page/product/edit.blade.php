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
                    <video width="320" height="240" controls>
                        <source src="{{ Storage::url($product->video_demo) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
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
                    <img src="{{ Storage::url($product->thumbnail) }}" width="100" alt="Current thumbnail">
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

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
    </div>
</div>
@endsection