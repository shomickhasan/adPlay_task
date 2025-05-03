<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Backend\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {

       $products = Product::OrderByDescId()
            ->paginate(self::WEB_PAGINATOR_NUMBER)
            ->withQueryString();
        return view('frontend.index',compact('products'));
    }
}
