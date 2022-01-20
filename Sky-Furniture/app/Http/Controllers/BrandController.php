<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Brand;
use App\Models\Item;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::select("brand_id","brand_code","brand_name")->orderBy('brand_name', 'asc')->get();
        foreach ($brands as $brand) {
            $brand->product = Item::where("brand_id",$brand->brand_id)->count();
        }
        return view("brand.brands",["brands"=>$brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Go To Add Brand Page
        return  view('brand.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store new brand into database manage using ajax request
        $message = "";
        $isAdded = true;
        try {
            Brand::insert([
                'brand_code' => strtoupper(dechex(time())),
                'brand_name' => strtoupper($request->brand_name),
                'created_at' => now(),
            ]);
            $message =  'Brand Successfull Added';
        } catch (\Throwable $th) {
            if ($th->getCode() == 23000) {
                $message =  'This Brand Already Exist';
            }else{
                $message = "Some Thing Went Wrong";
            }
            $isAdded = false;
        }
        return response()->json(['message' => $message,'isAdded'=>$isAdded]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::where("brand_id",$id)->select('brand_name','brand_id')->get()[0];
        return view('brand.show',['brand'=>$brand]);
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
        $message = "";
        try {
            if (Brand::where('brand_id',$id)->update(['brand_name'=>strtoupper($request->brand_name)])) {
                $message =  'Category Successfull Updated';
            }
        } catch (\Throwable $th) {
            $message = "Some Thing Went Wrong";
        }
        return ['message' => $message];

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
        $message = "";
        $isRemoved = false;
        $items = Item::where("brand_id",$id)->count();
        if ($items != 0) {
            $message = "This Brand Still Have Items In The Stock";
        }else {
            try {
                $des = Brand::where("brand_id",$id)->delete();
                $isRemoved = true;
            } catch (\Throwable $th) {
                $message = "Error Happen Code ".$th->getCode();
            }
        }
        return ['message' => $message,'isRemoved'=>$isRemoved];
    }
}
