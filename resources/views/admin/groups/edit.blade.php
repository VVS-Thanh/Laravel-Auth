@extends('layouts.admin')

@section('title', 'Sửa nhóm')

@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sửa nhóm</h1>
</div>
@if ($errors -> any())
    <div class="alert alert-danger text-center">Vui lòng kiểm tra dữ liệu nhập vào</div>
@endif

@if (session('msg'))
    <div class="alert alert-success">{{ session('msg') }}</div>
@endif
<form action="" method="POST">
    <div class="mb-3">
        <label for="">Tên</label>
        <input type="text" name="name" id="" class="form-control" placeholder="Tên..." value="{{ old('name') ?? $group -> name }}">

        @error('name')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    @csrf
</form>
@endsection
