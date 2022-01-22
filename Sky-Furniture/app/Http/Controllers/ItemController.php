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

    private $store_path = 'D:\GithubRepository\Sky-Furniture\Sky-Furniture\public\img\items/';

    public function index()
    {
        $items = Item::select("item_id", "item_code", "model", "brand_id", "category_id")->orderBy('model', 'asc')->get();
        foreach ($items as $item) {
            $item->brand_id = Brand::where("brand_id", $item->brand_id)->get("brand_name")[0]->brand_name;
            $item->category_id = Category::where("category_id", $item->category_id)->get("category_name")[0]->category_name;
        }
        return view("item.items", ["items" => $items]);
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
        $item = (Item::where('item_code', $id)->get())[0];
        $brand = (Brand::where('brand_id', $item->brand_id)->get("brand_name"))[0]->brand_name;
        $category = (Category::where('category_id', $item->category_id)->get("category_name"))[0]->category_name;
        $colors = Color::where("item_id", $item->item_id)->select("color", "pieces")->get();
        $extraImgs = Extra_Img::where("item_id", $item->item_id)->get("image");
        return view('item.show', ["item" => $item, "brand" => $brand, "category" => $category, "colors" => $colors, "extraImgs" => $extraImgs]);
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
        $item = (Item::where('item_id', $id)->get())[0];
        $colors = Color::where("item_id", $item->item_id)->select("color", "pieces", "color_id")->get();
        $extraImgs = Extra_Img::where("item_id", $item->item_id)->select("image", "img_id")->get();
        $brands = Brand::select("brand_id", "brand_name")->orderBy('brand_name', 'asc')->get();
        $categories = Category::select("category_id", "category_name")->orderBy('category_name', 'asc')->get();
        return view('item.edit', ["item" => $item, "colors" => $colors, "extraImgs" => $extraImgs, "brands" => $brands, "categories" => $categories]);
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
        $message = '';
        $is_removed = true;
        try {
            // Delete field from Colors and Extra images
            if (isset($request->process)) {
                if ($request->process == 'del') {
                    $req_array = explode('_',$request->input_name);
                    // detect that the field is in the color table
                    if ($req_array[0] == 'color') {
                        // the item must at least have one color
                        if (Color::where('item_id',$id)->count() > 0) {
                            // delete the row
                            Color::where('color_id', $req_array[1])->delete();
                            $message = "The Color Field Has Been Removed";
                        } else {
                            $message = "Can't Remove the Color as It Is The Last One";
                            $is_removed = false;
                        }
                    // detect that the field is in the extra_imgs table
                    }elseif ($req_array[0] == 'image') {
                        // delete the row
                        Extra_Img::where('img_id', $req_array[1])->delete();
                        $message = "The Extra Img Field Has Been Removed";
                    }
                }
            } else { // editing on saved changes
                // update the item
                Item::where('item_id',$id)->update([
                    'model' => urldecode($request->model),
                    'brand_id' => $request->brand_id,
                    'category_id' => $request->category_id,
                    'width' => $request->width,
                    'height' => $request->height,
                    'depth' => $request->depth,
                    'price' => $request->price,
                    'discount' => $request->discount,
                    'description' => urldecode($request->description),
                    'materials' => urldecode($request->materials),
                    'updated_at' => now(),
                ]);
                if ($_FILES['main_img']['tmp_name'] != "") {
                    // update the main image field
                    $pic_name = $_FILES['main_img']['name']; //the name of the uploaded image
                    $new_name = time().$pic_name; // assining new name depeding on time function to ensure its unique name
                    $stor_tmp = $_FILES['main_img']['tmp_name']; // get the tenproray location of the uploaded image
                    if (move_uploaded_file($stor_tmp, $this->store_path . $new_name)) {
                        Item::where('item_id',$id)->update([
                            'main_img' => $new_name,
                            'updated_at' => now(),
                        ]);
                    }
                }
                foreach ($request->post() as $key => $value) { // get all the fileds send by post request
                    // find the color fields
                    if (preg_match('/^color/',$key)) {
                        $n_key = explode('_',$key);
                        if ($n_key[1] != 'new') { // it is already exists row
                            // update the row
                            Color::where('color_id', $n_key[1])->update([
                                'color' => urldecode($value),
                                'updated_at' => now(),
                            ]);
                        }else {
                            foreach ($request->post() as $key2 => $value2) {
                                if ($key2 == 'pieces_'.$n_key[1].'_'.$n_key[2]) {
                                    Color::insert([
                                        'item_id' => $id,
                                        'color' => $value,
                                        'pieces' => $value2,
                                        'created_at' => now(),
                                    ]);
                                }
                            }
                        }
                    }elseif (preg_match('/^pieces/',$key)) {// find the pieces fields
                        $n_key = explode('_',$key);
                        if ($n_key[1] != 'new') { // it is already exists row
                            // update the row
                            Color::where('color_id', $n_key[1])->update([
                                'pieces' => urldecode($value),
                                'updated_at' => now(),
                            ]);
                        }
                    }
                }
                foreach ($_FILES as $key => $value) { // get the files uploaded
                    if ( preg_match('/^image/',$key) && $_FILES[$key]['tmp_name'] != "") {//find the extra image files
                        $n_key = explode('_',$key);
                        if ($n_key[1] != 'new'){
                            // update the main image field
                            $pic_name = $_FILES[$key]['name']; //the name of the uploaded image
                            $new_name = time().$pic_name; // assining new name depeding on time function to ensure its unique name
                            $stor_tmp = $_FILES[$key]['tmp_name']; // get the tenproray location of the uploaded image
                            if (move_uploaded_file($stor_tmp, $this->store_path . $new_name)) {
                                //update the extra image
                                Extra_Img::where('img_id',$n_key[1])->update([
                                    'image' => $new_name,
                                    'updated_at' => now(),
                                ]);
                            }
                        }else {
                            // update the main image field
                            $pic_name = $_FILES[$key]['name']; //the name of the uploaded image
                            $new_name = time().$pic_name; // assining new name depeding on time function to ensure its unique name
                            $stor_tmp = $_FILES[$key]['tmp_name']; // get the tenproray location of the uploaded image
                            if (move_uploaded_file($stor_tmp, $this->store_path . $new_name)) {
                                //update the extra image
                                Extra_Img::insert([
                                    'item_id' => $id,
                                    'image' => $new_name,
                                    'created_at' => now(),
                                ]);
                            }
                        }

                    }
                }
                $message = "Item Updated";
            }

        } catch (\Throwable $th) {
            $message = 'Some Thing Went Wrong Code: '. $th->getCode();
            $is_removed = false;
        }
        return ['message'=>$message,'isRemoved'=>$is_removed];
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
