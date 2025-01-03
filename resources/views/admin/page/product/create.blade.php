@extends('admin.layout.master')
@section('title', 'Danh mục')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <h2>Thêm sản phẩm mới</h2>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="video_demo" class="form-label">Video Demo</label>
                <input type="file" class="form-control-file @error('video_demo') is-invalid @enderror" id="video_demo" name="video_demo" accept="video/mp4,video/mov,video/avi" onchange="previewVideo(this);">
                @error('video_demo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">Hỗ trợ định dạng: MP4, MOV, AVI. Kích thước tối đa: 20MB</small>
                <div id="video-preview" class="mt-2" style="display: none;">
                    <video width="320" height="240" controls>
                        <source src="" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

            <div class="mb-3">
                <label for="thumbnail" class="form-label">Ảnh đại diện</label>
                <input type="file" class="form-control-file" id="thumbnail" name="thumbnail" accept="image/*" onchange="previewImage(this);">
                <div id="image-preview" class="mt-2" style="display: none;">
                    <img src="" alt="Preview" style="max-width: 200px; max-height: 200px;">
                </div>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục</label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                    <option value="">Chọn danh mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái</label>
                <select class="form-select" id="status" name="status">
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="link_access" class="form-label">Liên kết truy cập</label>
                <input type="url" class="form-control @error('link_access') is-invalid @enderror" id="link_access" name="link_access" value="{{ old('link_access') }}">
                @error('link_access')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="link_faq" class="form-label">Liên kết câu hỏi</label>
                <input type="url" class="form-control @error('link_faq') is-invalid @enderror" id="link_faq" name="link_faq" value="{{ old('link_faq') }}">
                @error('link_faq')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="link_call" class="form-label">Liên kết đặt cược</label>
                <input type="url" class="form-control @error('link_call') is-invalid @enderror" id="link_call" name="link_call" value="{{ old('link_call') }}">
                @error('link_call')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="link_download" class="form-label">Liên kết tải xuống</label>
                <input type="url" class="form-control @error('link_download') is-invalid @enderror" id="link_download" name="link_download" value="{{ old('link_download') }}">
                @error('link_download')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="link_pricing" class="form-label">Liên kết giá cả</label>
                <input type="url" class="form-control @error('link_pricing') is-invalid @enderror" id="link_pricing" name="link_pricing" value="{{ old('link_pricing') }}">
                @error('link_pricing')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="link_review" class="form-label">Liên kết đánh giá</label>
                <input type="url" class="form-control @error('link_review') is-invalid @enderror" id="link_review" name="link_review" value="{{ old('link_review') }}">
                @error('link_review')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    var preview = document.getElementById('image-preview');
    var image = preview.querySelector('img');
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
            image.src = e.target.result;
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
    }
}

function previewVideo(input) {
    var preview = document.getElementById('video-preview');
    var video = preview.querySelector('video');
    var source = video.querySelector('source');
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
            source.src = e.target.result;
            video.load();
            preview.style.display = 'block';
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.style.display = 'none';
    }
}
</script>

@endsection
