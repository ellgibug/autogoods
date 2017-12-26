<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use App\Product;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function categories()
    {
        $parent_levels = Level::whereNull('parent_id')->get();

        return view('admin.pages.categories')->with(compact('parent_levels'));
    }

    public function add_category(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
            ]);

        $level = new Level();
        $level->parent_id = $request['id'];
        $level->name = $request['name'];
        $level->save();

        return response()->json($level);
    }

}
