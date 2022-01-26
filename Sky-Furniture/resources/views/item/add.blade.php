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
    <div class="control new">
        <h1>Add New Item</h1>
        <form action="/items/add">
            @csrf
            <!-- model -->
            <div>
                <label for="model">Model</label>
                <div class="input-con">
                    <input class="input disabled" type="text" name="model" required />
                </div>
            </div>
            <!-- barnd and category -->
            <div>
                <div class="input-2col">
                    <label for="brand">Brand</label>
                    <label for="category">Category</label>
                </div>
                <div class="input-2col">
                    <div class="input-con">
                        <select class="input disabled mr-2" name="brand" required>
                            <option disabled selected>Select Brand</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-con">
                        <select class="input disabled" name="category" required>
                            <option disabled selected>Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- Main Image -->
            <div>
                <label for="mainImg">Main Image</label>
                <div class="input-con">
                    <img id="image-0" src="" alt="Main Img">
                    <input id="image-0" class="input disabled" required value="Italian Bosshkash Chair" type="file" name="main_img" accept="image/*" />
                </div>
            </div>
            <!-- Extra Images -->
            <div>
                <div class="input-con" style="justify-content: space-between;">
                    <label for="extraImg">Extra Images</label>
                    <svg class="addImg" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="input-con">
                    <img id="image-0" src="" alt="Extra Img">
                    <input id="image-0" class="input disabled" style="width: 80%;" required value="Italian Bosshkash Chair" type="file" name="image_new_0" accept="image/*">
                    <div>
                        <div class="remove">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Color and number of Pieces -->
            <div>
                <div class="input-2col mt-1">
                    <label for="color">Color</label>
                    <label for="pieces">Pieces</label>
                    <svg class="addColor" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="input-2col">
                    <div class="input-con">
                        <input class="input disabled mr-1" required type="text" name="color_new_0">
                    </div>
                    <div class="input-con">
                        <input class="input disabled mr-1" required min="0" type="number" name="pieces_new_0">
                        <div class="remove">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Price and Discount -->
            <div>
                <div class="input-2col">
                    <label for="price">Price</label>
                    <label for="discount">Discount</label>
                </div>
                <div class="input-2col">
                    <div class="input-con">
                        <input class="input disabled mr-1" required min="0" step="0.01" type="number" name="price">
                    </div>
                    <div class="input-con">
                        <input class="input disabled mr-1" required min="0" max="100" step="0.01" type="number" name="discount">
                    </div>
                </div>
            </div>
            <!-- Width, Height and Depth -->
            <div>
                <div class="input-3col">
                    <label for="width">Width</label>
                    <label for="height">Height</label>
                    <label for="depth">Depth</label>
                </div>
                <div class="input-3col">
                    <div class="input-con">
                        <input class="input disabled mr-1" required min="0" step="0.01" type="number" name="width">
                    </div>
                    <div class="input-con">
                        <input class="input disabled mr-1" required min="0" step="0.01" type="number" name="height">
                    </div>
                    <div class="input-con">
                        <input class="input disabled mr-1" required min="0" step="0.01" type="number" name="depth">
                    </div>
                </div>
            </div>
            <!-- Description -->
            <div>
                <label for="description">Description</label>
                <textarea class="input disabled" name="description" cols="30" rows="5" required></textarea>
            </div>
            <!-- Materials -->
            <div>
                <label for="materias">Materials</label>
                <textarea class="input disabled" name="materias" cols="30" rows="5" required></textarea>
            </div>
            <!-- submit button -->
            <div class="input-con">
                <button type="submit">Add</button>
            </div>
        </form>
    </div>
</main>
@endsection
@section('script')
<script src="{{asset('js/employee/editItem.js')}}"></script>
@endsection
