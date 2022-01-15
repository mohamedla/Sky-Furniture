@extends('layouts.employee')

@section('title', 'Brands')

@section('content')
<!-- main content -->
    <main>
        <!-- wrapper -->
        <div class="control">
            <h1>Brand ({{$brand->brand_name}})</h1>
            <form method="POST" action="/brands/{{$brand->brand_id}}">
                @csrf
                <!-- Name -->
                <div>
                    <label for="brand_name">Name</label>
                    <div class="input-con">
                        <input class="input disabled" readonly value="{{$brand->brand_name}}"  type="text" name="brand_name" required>
                        <div class="change">
                            <svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="input-con">
                    <button type="submit">Save Changes</button>
                </div>
            </form>
        </div>
    </main>
@endsection
@section('script')
    <script src="{{asset('js/employee/object.js')}}"></script>
@endsection