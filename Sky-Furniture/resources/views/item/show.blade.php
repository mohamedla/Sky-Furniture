@extends('layouts.client')

@section('content')

<div class="item">
    <div class="ItemDel">
        <div class="first">
            <div class="w-fit">
                <div class="imgs">
                    <div id="darkgary-item">
                        <img src="{{asset('img/items/'.$item->main_img)}}" alt="black-chair">
                    </div>
                </div>
                <div class="my-5">
                    <!-- Rating Stars -->
                    <span class="rating">
                        <span class="font-bold">Rating <sub>({{$item->rating}})</sub> :</span> &ThickSpace;
                        @php
                            $icon = 100 - ($item->rating *20);
                        @endphp
                        <i style="-webkit-clip-path: inset(0 {{$icon}}% 0 0);clip-path: inset(0 {{$icon}}% 0 0);">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </i> &ThickSpace;
                        <sup>({{$item->purchased}})</sup>
                    </span>
                </div>
            </div>
            <div class="details">
                <!-- model -->
                <p>
                    <span class="font-bold">Model:</span>&ThickSpace;
                    <span class="capitalize">{{$item->model}}</span>
                </p>
                <!-- brand -->
                <p>
                    <span class="font-bold">Brand:</span>&ThickSpace;<span class="uppercase">{{$brand}}</span>
                </p>
                <!-- category -->
                <p>
                    <span class="font-bold">Category:</span>&ThickSpace;<span>{{$category}}</span>
                </p>
                <!-- measurements -->
                <p>
                    <span class="font-bold">Measurements:</span><br>
                    &ThickSpace;&ThickSpace;&ThickSpace;Width({{$item->width}}cm)<br>
                    &ThickSpace;&ThickSpace;&ThickSpace;Depth({{$item->depth}}cm)<br>
                    &ThickSpace;&ThickSpace;&ThickSpace;Height({{$item->height}}cm)<br>
                </p>
                <!-- price -->
                @php
                    if($item->discount != 0){
                        $newPrice = $item->price - (($item->discount/100)*$item->price);
                    }
                @endphp
                @if($item->discount != 0)
                    <p>
                        <span class="font-bold">Price:</span>&ThickSpace;<span class="uppercase"><del>{{$item->price}}&dollar;&ThickSpace; </del>{{$newPrice}}&dollar;</span>
                    </p>
                @else
                    <p>
                        <span class="font-bold">Price:</span>&ThickSpace;<span class="uppercase">{{$item->price}}&dollar;</span>
                    </p>
                @endif
                <!-- colors -->
                <div class="colors">
                    <span>Avaible&nbsp;Color<sub>(pieces)</sub>:</span>
                    <div>
                        @foreach($colors as $color)
                            <div class="color" style="background-color: {{$color->color}};" title="Dark Gray"></div><sub>({{$color->pieces}})</sub>
                        @endforeach
                    </div>
                </div>
                <!-- add to a list -->
                <div class="addList">
                    <div id="addtocartmain">
                        Add To Cart
                    </div>
                    <div class="addFav">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    </div>
                </div>
                <!-- extra images -->
                <div class="extraImgs">
                        @foreach($extraImgs as $image)
                        <img src="{{asset('img/items/'.$image->image)}}">
                        @endforeach
                </div>
            </div>
        </div>
        
        <div class="extraDel">
            <div>
                <div id="description" class="triger"><span>Product Description</span></div>
                <div id="materials" class="triger"><span>Materials</span></div>
            </div>
            <div class="mt-5">
                <p id="description-box" class="box">
                    @php
                        $search = array("\r\n","\r","\n");
                        $description = str_replace($search,"<br/>-&ThickSpace;",$item->description);
                        $materials = str_replace($search,"<br/>",$item->materials);
                        print($description);
                    @endphp
                </p>
                <p id="materials-box">
                    @php
                        print($materials);
                    @endphp
                </p>
            </div>
        </div>
    </div>
    <!-- you might also like -->
    <div class="also">
        <h3>you might also like</h3>
        <!-- cards -->
        <div class="slider-container">
            <div class="scroll-arrow right">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </div>
            <div class="scroll-arrow left">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </div>
            <div class="slider">
                <div>
                    @for($i=0 ; $i< 6 ; $i++)
                        <div class="card">
                            <a href="/item/AFDEC3">
                                <img class="item-img" src="{{asset('img/living-room.avif')}}" alt="living-room" title="TANNISBY Living Room">
                                <p>
                                    <span class="font-bold">Model:</span>&ThickSpace;
                                    <span class="capitalize">TANNISBY living room </span>
                                </p>
                                <p>
                                    <span class="font-bold">Brand:</span>&ThickSpace;<span class="uppercase">ikea</span>
                                </p>
                                <!-- Rating Stars -->
                                <span class="rating">
                                    <span class="font-bold">Rating <sub>(4.5)</sub> :</span> &ThickSpace;
                                    <i>
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    </i> &ThickSpace;
                                    <sup>(25)</sup>
                                </span>
                                <!-- budges -->
                                <!-- price -->
                                <div class="price-budge">
                                    <span>989 &dollar;</span>
                                </div>
                            </a>
                            <!-- add to favourite -->
                            <div class="favourit-budge">
                                <div>
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                                </div>
                            </div>
                            <!-- add to cart -->
                            <div class="addtocart">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script type="module" src="{{asset('js/index-main.js')}}"></script>
    <script type="module" src="{{asset('js/item.js')}}"></script>
@endsection
            
