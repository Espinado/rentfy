<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins\Category;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;


class CategoryController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin');
    }

    public function index()
    {
        $categories = Category::where('parent_id', null)->get();

        $locale = LaravelLocalization::GetCurrentLocale();
        foreach ($categories as $cat) {
            if (!property_exists(json_decode($cat->category_name), $locale)) {
                $locale = config('app.fallback_locale');
            }
        }
        return view('admin.categories.index', compact('categories', 'locale'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "category_name"    => "required|array|min:3",
            "category_name.*"  => "required|min:3",
        ]);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return back()->with('error', $messages);
        } else {
            if ($request->parent_id) {
                $parent_id = $request->parent_id;
            } else {
                $parent_id = null;
            }
            $category = new Category;
            $category->parent_id = $parent_id;
            $category->category_name = json_encode($request->category_name);
            $category->save();
        }
        return back()->with('success', 'Recorded');
    }

    public function edit_form($id)
    {
        $category = Category::where('id', $id)->first();
        $cat_array = json_decode($category->category_name);
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            if (!property_exists($cat_array, $properties['short'])) {
                $dev = $properties['short'];
                $cat_array->$dev = '';
            }
        }
        return view('admin.categories.cat_edit_form', compact('cat_array', 'id'));
    }
    public function update(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            "category_name"    => "required|array|min:3",
            "category_name.*"  => "required|min:3",
        ]);
        if ($validator->fails()) {
            $messages = $validator->errors();
            return back()->with('error', $messages);
        }
        Category::where('id', $request->id)->update(['category_name' => json_encode($request->category_name)]);
        return redirect('admin/categories')->with('success', 'Updated');
    }
}
