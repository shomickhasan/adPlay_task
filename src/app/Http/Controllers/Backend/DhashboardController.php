<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Uddokta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductType;

class DhashboardController extends Controller
{
    public function index(){
        return view('backend.pages.dashboard');
    }
}
