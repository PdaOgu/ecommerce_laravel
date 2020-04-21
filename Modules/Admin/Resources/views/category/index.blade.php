@extends('admin::layouts.master')

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" title="Trang chủ">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh mục</a></li>
    </ol>
</nav>
<div class="table-responsive">
<h2>Quản lý danh mục <a href="{{ route('admin.get.create.category') }}" class=""><i class="fas fa-plus fa-xs"></i></a></h2>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Title SEO</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @isset($categories)
                @php
                    $i = 1;
                @endphp
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $category->c_name }}</td>
                    <td>{{ $category->c_title_seo }}</td>
                    <td>{{ $category->c_active }}</td>
                    <td>
                        <a href="{{ route('admin.get.edit.category', $category->id) }}"><i class="fas fa-edit"></i></a>
                        <a href=""><i class="fas fa-trash    "></i></a>
                    </td>
                </tr>
                @endforeach
            @endisset
        </tbody>
    </table>
</div>
@endsection
