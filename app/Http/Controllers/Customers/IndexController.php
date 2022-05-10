<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admins\Category;
use LaravelLocalization;
use App\Helpers\CatMultilangArray;

class IndexController extends Controller
{
    public function index() {

        $categories = Category::where('parent_id', null)->get();
        // $r=CatMultilangArray::parseArray($categories);
        return view('customers.index', compact ('categories'));
    }
}
