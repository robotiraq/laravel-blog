<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return response()->json([
            'menus' => Menu::all()
        ]);
    }

    public function create()
    {
        return view('menu.create');
    }

    public function show($id)
    {
        $data = Menu::findOrFail($id);
        return response()->json([
            $data->meals
        ]);
    }

    public function store()
    {
        $attributes = \request()->validate([
            'name' => 'required|min:1|max:255'
        ]);

        Menu::create($attributes);

        $data = [
            'message'=>'Menu created',
            'status'=>201
        ];
        return response()->json($data,201);

    }
}
