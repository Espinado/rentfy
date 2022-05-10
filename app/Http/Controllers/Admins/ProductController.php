<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {

        $this->middleware('admin');
    }

    public function index() {

        return view ('admin.products.index');
    }

}
