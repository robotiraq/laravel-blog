<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use App\Models\FoodItem;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        return response()->json([
            'menus' => Menu::query()->with([
                'categories' => fn ($q) => $q->with([
                    'foodItems'
                ])
            ])->get()
        ]);
    }

    public function create()
    {
        return view('menu.create');
    }

    public function show($id)
    {
        $categories = FoodCategory::all()->where('menu_id',$id);
        return response()->json([
            [
                'menu' =>   Menu::findOrFail($id),
                'food_items'=> FoodItem::all()->where('food_category_id',$categories)
            ]
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
