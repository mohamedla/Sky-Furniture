<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// models
use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Extra_Img;
use Illuminate\Support\Facades\DB;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show item by code
        $item = (Item::where('item_code',$id)->get())[0];
        $brand = (Brand::where('brand_id',$item->brand_id)->get("brand_name"))[0]->brand_name;
        $category = (Category::where('category_id',$item->category_id)->get("category_name"))[0]->category_name;
        $colors = Color::where("item_id",$item->item_id)->select("color","pieces")->get();
        $extraImgs = Extra_Img::where("item_id",$item->item_id)->get("image");
        return view('item.show',["item" =>$item, "brand" => $brand, "category" => $category, "colors"=>$colors,"extraImgs"=>$extraImgs]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
