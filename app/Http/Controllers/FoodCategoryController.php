<?php

namespace App\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function create($id)
    {

        return view('menu.category.create',[
            'id'=> $id
        ]);
   }

    public function store($id)
    {
        $attributes = \request()->validate([
           'name'=> 'required'
        ]);

        $attributes['menu_id'] = $id;
        $category = FoodCategory::create($attributes);

        $data = [
            'message'=>'Category created',
            'menu_id'=> $category->menu_id,
            'category_name' => $category->name,
            'status'=>201
        ];
        return response()->json($data,201);

    }
}
