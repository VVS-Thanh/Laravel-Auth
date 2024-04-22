@extends('layouts.admin')

@section('title', 'Danh sách bài viết')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Danh sách bài viết</h1>
    </div>
    @if (session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    @can('posts.add')
        <p><a href="{{ route('admin.posts.add') }}" class="btn btn-primary">Thêm mới</a></p>
    @endcan
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Tiêu đề</th>
                <th>Người đăng</th>
                @can('posts.edit')
                    <th width="5%">Sửa</th>
                @endcan
                @can('posts.delete')
                    <th width="5%">Xoá</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @if ($lists->count() > 0)
                @foreach ($lists as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            {{ !empty($item->postBy->name) ? $item->postBy->name : false }}
                        </td>
                        @can('posts.edit')
                            <td>
                                <a href="{{ route('admin.posts.edit', $item) }}" class="btn btn-warning">Sửa</a>
                            </td>
                        @endcan
                        @can('posts.delete')
                            <td>
                                <a onclick="return confirm ('Bạn có chắc chắn?')"
                                    href="{{ route('admin.posts.delete', $item) }}" class="btn btn-danger">Xoá</a>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
