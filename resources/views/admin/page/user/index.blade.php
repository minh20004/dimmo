@extends('admin.layout.master')
@section('title', 'Danh sách tài khoản')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card p-3">
                    <h4 class="card-title mb-0 flex-grow-1">Danh sách người dùng</h4>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center flex-wrap gap-2">
                            <a href="{{ route('users.create') }}" class="btn btn-success">
                                <i class="ri-add-circle-line align-bottom me-1"></i> Thêm người dùng
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên tài khoản</th>
                                        <th>Email</th>
                                        <th>Vai trò</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $index =>  $user)
                                    <tr>
                                        <td>{{ $index +1 }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ ucfirst($user->role) }}</td>
                                        <td>
                                            <span class="badge bg-{{ $user->status === 'active' ? 'success' : 'danger' }}">
                                                {{ $user->status === 'active' ? 'Hoạt động' : 'Ngừng hoạt động' }}
                                            </span>
                                        </td>
                                        <td>
                                            <form action="{{ route('users.toggle-status', $user->id) }}" 
                                                  method="POST" 
                                                  style="display: inline-block;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" 
                                                        class="btn btn-{{ $user->status === 'active' ? 'danger' : 'success' }} btn-sm">
                                                    {{ $user->status === 'active' ? 'Ngừng hoạt động' : 'Khôi phục' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection