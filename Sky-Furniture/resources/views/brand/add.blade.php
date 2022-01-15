@extends('layouts.employee')

@section('title', 'Brands')

@section('content')
<main>
    <!-- wrapper -->
    <div class="control new">
        <h1>New Brand</h1>
        <form method="POST" action="/brands/add">
            @csrf
            <!-- Title -->
            <div>
                <label for="name">Brand</label>
                <div class="input-con">
                    <input class="input disabled"  type="text" name="brand_name" required/>
                </div>
            </div>
            <div class="input-con">
                <button type="submit">Add</button>
            </div>
            <div class="message">
                
            </div>
        </form>
    </div>
</main>
@endsection
@section('script')
    <script src="{{asset('js/employee/addingNew.js')}}"></script>
@endsection