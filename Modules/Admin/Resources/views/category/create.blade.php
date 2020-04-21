@extends('admin::layouts.master')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" title="Trang chủ">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.get.list.category') }}" title="Danh mục">Danh mục</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
    </ol>
</nav>
<div class="">
    @include('admin::category.form')
</div>
@endsection
