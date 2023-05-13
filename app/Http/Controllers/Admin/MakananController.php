<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        return view('dashboard.makanan.index');
    }
}
