@extends('layouts.employee')

@section('title', 'Items')

@section('content')
<!-- main content -->
<main>
    <!-- Message -->
    <div id="item_message">
        <span></span>
    </div>
    <!-- wrapper -->
    <div class="control">
        <h1>Product (Italian Bosshkash Chair)</h1>
        <center>Please Be Careful Don't Save The Change Untill You Finsh Editing</center>
        <form method="post" action="/items/{{$item->item_id}}">
            @csrf
            <!-- model -->
            <div>
                <label for="model">Model</label>
                <div class="input-con">
                    <input class="input disabled" readonly value="{{$item->model}}"  type="text" name="model" required>
                    <div class="change">
                        <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </div>
            <!-- barnd and category -->
            <div>
                <div class="input-2col">
                    <label for="brand_id">Brand</label>
                    <label for="category_id">Category</label>
                </div>
                <div class="input-2col">
                    <div class="input-con mr-1">
                        <select class="input disabled" name="brand_id" readonly required aria-placeholder="Choose Catagory">
                        @foreach ($brands as $brand)
                            @if($brand->brand_id == $item->brand_id)
                                <option value="{{$brand->brand_id}}" selected>{{$brand->brand_name}}</option>
                            @else
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                            @endif
                        @endforeach
                        </select>
                        <div class="change">
                            <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="input-con">
                        <select class="input disabled" name="category_id" readonly required aria-placeholder="Choose Catagory">
                        @foreach ($categories as $category)
                            @if($category->category_id == $item->category_id)
                                <option value="{{$category->category_id}}" selected>{{$category->category_name}}</option>
                            @else
                                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                            @endif
                        @endforeach
                        </select>
                        <div class="change">
                            <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Image -->
            <div>
                <label for="main_img">Main Image</label>
                <div class="input-con">
                    <img id="image-0" src="{{asset('img/items/'.$item->main_img)}}" alt="Main Image">
                    <input id="image-0" class="input disabled" style="width: 80%;" readonly required value="Italian Bosshkash Chair"  type="file" name="main_img" accept="image/*">
                    <div class="change">
                        <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
            </div>
            <!-- Extra Images -->
            <div id="extra">
                <div class="input-con" style="justify-content: space-between;">
                    <label>Extra Images</label>
                    <svg class="addImg" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                @for($i = 0; $i < count($extraImgs); $i++)
                    <div class="input-con">
                        <img id="image_{{$i}}" src="{{asset('img/items/'.$extraImgs[$i]->image)}}" alt="Extra Image">
                        <input id="image_{{$i}}" class="input disabled" style="width: 80%;" readonly required type="file" name="image_{{$extraImgs[$i]->img_id}}" accept="image/*">
                        <div class="change">
                            <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        </div>
                        <div>
                            <div class="remove">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <!-- Color and number of Pieces -->
            <div id="colors">
                <div class="input-2col">
                    <label for="color">Color</label>
                    <label for="pieces">Pieces</label>
                    <svg class="addColor" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                @for($i=0;$i< count($colors);$i++)
                    <div class="input-2col mb-1">
                        <div class="input-con mr-1">
                            <div class="pre_color" style="background-color: {{$colors[$i]->color}};">

                            </div>
                            <input class="input disabled" readonly required  value="{{$colors[$i]->color}}"  type="text" name="color_{{$colors[$i]->color_id}}">
                            <div class="change">
                                <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                        <div class="input-con">
                            <input class="input disabled" readonly required min="0" value="{{$colors[$i]->pieces}}"  type="number" name="pieces_{{$colors[$i]->color_id}}">
                            <div class="change">
                                <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                            </div>
                            @if($i != 0)
                                <div class="remove">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </div>
                            @endif

                        </div>
                    </div>
                @endfor
            </div>
            <!-- Price and Discount -->
            <div>
                <div class="input-2col">
                    <label for="price">Price</label>
                    <label for="discount">Discount</label>
                </div>
                <div class="input-2col">
                    <div class="input-con mr-1">
                        <input class="input disabled" readonly required value="{{$item->price}}" min="0" step="0.01" type="number" name="price">
                        <div class="change">
                            <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="input-con">
                        <input class="input disabled" readonly required min="0"  value="{{$item->discount}}" min="0" max="100" step="0.01"  type="number" name="discount">
                        <div class="change">
                            <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Width, Height and Depth -->
            <div>
                <div class="input-3col">
                    <label for="width">Width <sub>cm</sub></label>
                    <label for="height">Height <sub>cm</sub></label>
                    <label for="depth">Depth <sub>cm</sub></label>
                </div>
                <div class="input-3col">
                    <div class="input-con mr-1">
                        <input class="input disabled" readonly required value="{{$item->width}}" min="0" step="0.01" type="number" name="width">
                        <div class="change">
                            <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="input-con">
                        <input class="input disabled" readonly required value="{{$item->height}}" min="0" step="0.01"  type="number" name="height">
                        <div class="change">
                            <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                    <div class="input-con">
                        <input class="input disabled" readonly required value="{{$item->depth}}" min="0" step="0.01"  type="number" name="depth">
                        <div class="change">
                            <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Description -->
            <div>
                <label for="description">Description</label>
                <div class="input-con">
                    <textarea class="input disabled" readonly name="description" cols="30" rows="5" required>{{$item->description}}</textarea>
                    <div class="change">
                        <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </div>
            <!-- Materials -->
            <div>
                <label for="materias">Materials</label>
                <div class="input-con">
                    <textarea class="input disabled" readonly name="materials" cols="30" rows="5" required>{{$item->materials}}</textarea>
                    <div class="change">
                        <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        </div>
                </div>
            </div>
            <!-- sumbit button -->
            <div class="input-con">
                <button type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</main>
@endsection
@section('script')
    <!-- <script src="{{asset('js/employee/object.js')}}"></script> -->
    <script src="{{asset('js/employee/editItem.js')}}"></script>
@endsection
