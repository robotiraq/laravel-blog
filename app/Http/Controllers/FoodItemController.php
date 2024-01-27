<?php

namespace App\Http\Controllers;

use App\Models\FoodItem;
use Illuminate\Http\Request;

class FoodItemController extends Controller
{
    public function create($id)
    {
        return view('menu.foodItem.create',[
            'id'=> $id
        ]);
    }

    public function store($id)
    {
        $attributes = \request()->validate([
           'name'=> 'required',
            'desc'=> 'required',
            'price'=> 'required|numeric',
            'thumbnail'=> 'required|image'
        ]);

        $attributes['food_category_id'] = $id;
        $attributes['thumbnail']= \request()->file('thumbnail')->store('thumbnails');

        $foodItem = FoodItem::create($attributes);

        $data = [
            'message'=>'Item created',
            'item_id'=> $foodItem->id,
            'item_desc' => $foodItem->desc,
            'item_price'=> $foodItem->price,
            'food_category_id'=> $foodItem->food_category_id,
            'status'=>201
        ];
        return response()->json($data,201);

    }
}
