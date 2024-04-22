@extends('layouts.admin')

@section('title', 'Thêm bài viết')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thêm bài viế<tbody></tbody></h1>
</div>
@if ($errors -> any())
    <div class="alert alert-danger text-center">Vui lòng kiểm tra dữ liệu nhập vào</div>
@endif

<form action="" method="POST">
    <div class="mb-3">
        <label for="">Tên</label>
        <input type="text" name="title" id="" class="form-control" placeholder="Tiêu đề..." value="{{ old('title') }}">

        @error('title')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="">Nội dung</label>
        <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Nội dung bài viết....">{{ old('content') }}</textarea>

        @error('content')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
    @csrf
</form>
@endsection
