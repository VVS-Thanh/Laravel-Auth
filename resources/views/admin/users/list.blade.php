@extends('layouts.admin')

@section('title', 'Danh sách người dùng')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách người dùng</h1>
    </div>
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    @can('users.add')
        <p><a href="{{ route('admin.users.add') }}" class="btn btn-primary">Thêm mới</a></p>
    @endcan
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Nhóm</th>
                @can('users.edit')
                    <th>Sửa</th>
                @endcan
                @can('users.delete')
                    <th>Xoá</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @if ($lists->count() > 0)
                @foreach ($lists as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->group->name }}</td>
                        @can('users.edit')
                            <td>
                                <a href="{{ route('admin.users.edit', $item) }}" class="btn btn-warning">Sửa</a>
                            </td>
                        @endcan
                        @can('users.delete')
                            <td>
                                @if (Auth::user()->id !== $item->id)
                                    <a onclick="return confirm ('Bạn có chắc chắn?')"
                                        href="{{ route('admin.users.delete', $item) }}" class="btn btn-danger">Xoá</a>
                                @endif
                            </td>
                        @endcan
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
