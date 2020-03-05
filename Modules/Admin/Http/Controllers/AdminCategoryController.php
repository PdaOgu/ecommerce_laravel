<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index ()
    {
        $categories = Category::select('id', 'c_name', 'c_title_seo', 'c_active')->get();
        $viewData = [
            'categories' => $categories,
        ];
        return view('admin::category.index', $viewData);
    }

    public function create () {
        return view('admin::category.create');
    }

    public function store (RequestCategory $reqCategory) {
        // dd($reqCategory->all());

        $category = new Category();
        $category->c_name = $reqCategory->name;
        $category->c_slug = Str::slug($reqCategory->name);
        $category->c_icon = Str::slug($reqCategory->icon);
        $category->c_title_seo = $reqCategory->c_title_seo ? $reqCategory->c_title_seo : $reqCategory->name;
        $category->c_description_seo = $reqCategory->c_description_seo;
        $category->save();

        return redirect()->back();
    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }
}
