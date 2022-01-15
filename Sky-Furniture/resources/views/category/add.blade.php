@extends('layouts.employee')

@section('title', 'Brands')

@section('content')
<!-- main content -->
<main>
    <!-- wrapper -->
    <div class="control new">
        <h1>New Category</h1>
        <form method="POST" action="/categories/add">
            @csrf
            <!-- Title -->
            <div>
                <label for="category_name">Category</label>
                <div class="input-con">
                    <input class="input disabled"  type="text" name="category_name" required/>
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