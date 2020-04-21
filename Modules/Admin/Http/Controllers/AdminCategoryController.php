<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

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
        $this->insertOrUpdate($reqCategory);
        return redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin::category.edit', compact('category'));
    }

    public function update(RequestCategory $reqCategory, $id)
    {
        $this->insertOrUpdate($reqCategory, $id);
        return redirect()->back();
    }

    private function insertOrUpdate (RequestCategory $reqCategory, $id='')
    {
        $code = 1;
        try {
            $category = new Category();
            if ($id) {
                $category = Category::find($id);
            }
            $category->c_name = $reqCategory->name;
            $category->c_slug = Str::slug($reqCategory->name);
            $category->c_icon = Str::slug($reqCategory->icon);
            $category->c_title_seo = $reqCategory->c_title_seo ? $reqCategory->c_title_seo : $reqCategory->name;
            $category->c_description_seo = $reqCategory->c_description_seo;
            $category->save();
            Log::info('[insertOrUpdate Category] success');
        } catch (\Exception $exception) {
            $code = 0;
            Log::error('[Error insertOrUpdate Category] '.$exception->getMessage());
        }
        return $code;
    }
}
