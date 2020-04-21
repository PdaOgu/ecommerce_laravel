@php
use App\Models\Category;
    if (!isset($category)) {
        $category = new Category();
    }
@endphp
<form method="POST">
    @csrf
    <div class="form-group">
        <label class="required">Tên danh mục:</label>
        <input type="text" class="form-control" name="name" placeholder="Nhập tên danh mục"
            value="{{ old('name', $category->c_name) }}">
        @if ($errors->has('name'))
        <span class="error-text">
            {{ $errors->first('name') }}
        </span>
        @endif
    </div>
    <div class="form-group">
        <label for="icon" class="required">Icon:</label>
        <input type="text" class="form-control" name="icon" placeholder="fa-home"
            value="{{ old('icon', $category->c_icon) }}">
        @if ($errors->has('icon'))
        <span class="error-text">
            {{ $errors->first('icon') }}
        </span>
        @endif
    </div>
    <div class="form-group">
        <label class="">Meta title:</label>
        <input type="text" class="form-control" name="c_title_seo" placeholder="Nhập meta title"
            value="{{ old('c_title_seo', $category->c_title_seo) }}">
    </div>
    <div class="form-group">
        <label class="">Meta description:</label>
        <input type="text" class="form-control" name="c_description_seo" placeholder="Nhập meta description"
            value="{{ old('c_description_seo', $category->c_description_seo) }}">
    </div>
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="hot" id="hot" value="checkedValue">
            Nổi bật
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
</form>
