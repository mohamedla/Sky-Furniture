<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select("category_id","category_code","category_name")->orderBy('category_name', 'asc')->get();
        foreach ($categories as $category) {
            $category->product = Item::where("category_id",$category->category_id)->count();
        }
        return view('category.categories',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // store new category into database manage using ajax request
        $message = "";
        $isAdded = true;
        try {
            Category::insert([
                'category_code' => strtoupper(dechex(time())),
                'category_name' => ucwords($request->category_name),
                'created_at' => now(),
            ]);
            $message =  'Category Successfull Added';
        } catch (\Throwable $th) {
            if ($th->getCode() == 23000) {
                $message =  'This Category Already Exist';
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
        $category = Category::where("category_id",$id)->select('category_name','category_id')->get()[0];
        return view('category.show',['category'=>$category]);
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
            if (Category::where('category_id',$id)->update(['category_name'=>ucwords($request->category_name)])) {
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
        $items = Item::where("category_id",$id)->count();
        if ($items != 0) {
            $message = "This Category Still Have Items In The Stock";
        }else {
            try {
                $des = Category::where("category_id",$id)->delete();
                $isRemoved = true;
            } catch (\Throwable $th) {
                $message = "Error Happen Code ".$th->getCode();
            }
        }
        return ['message' => $message,'isRemoved'=>$isRemoved];
    }
}
