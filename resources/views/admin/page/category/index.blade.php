@extends('admin.layout.master')
@section('title', 'Danh mục')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <h2>Quản lý danh mục </h2>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right ml-2">Thêm mới</a>
                        <a href="{{ route('category.trashed') }}" class="btn btn-warning float-right">Thùng rác</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Mô tả</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                <tr>
                                    <td>{{ $index +1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        {{-- <a href="{{ route('categories.show', $category->id) }}" 
                                            class="btn btn-sm btn-primary">Chi tiết</a> --}}
                                        <a href="{{ route('categories.edit', $category->id) }}" 
                                            class="btn btn-sm btn-info">Sửa</a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" 
                                            method="POST" 
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection