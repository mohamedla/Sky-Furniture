@extends('layouts.employee')

@section('title', 'Brands')

@section('content')
<!-- main content -->
<main class="manage">
    <!-- wraper -->
    <div>
        <!-- search bar -->
        <div class="search">
            <!-- Stander search bar -->
            <form action="#">
                <div>
                    <label>Search</label>
                    <input id="searchvalue" type="text" placeholder="Enter Value">
                    <button type="submit">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div>
                    <select name="" id="" aria-placeholder="Choose Catagory">
                        <option value="0" disabled selected>Select a Search Type</option>
                            <option value="">ID</option>
                            <option value="">User</option>
                            <option value="">Status</option>
                    </select>
                </div>
            </form>
        </div>
        <!-- Data Table -->
        <table class="manage">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Products</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @for($i=0 ; $i < count($categories) ; $i++ )
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$categories[$i]->category_code}}</td>
                        <td>{{$categories[$i]->category_name}}</td>
                        <td>{{$categories[$i]->product}}</td>
                        <td>
                            <div>
                                <a href="/categories/{{$categories[$i]->category_id}}">
                                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                </a>
                            </div>
                        </td>
                        <td class="removeBtn">
                            <div data_url="/categories/{{$categories[$i]->category_id}}">
                                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                            </div>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</main>
@endsection
@section('script')
    <script src="{{asset('js/employee/remove.js')}}"></script>
@endsection