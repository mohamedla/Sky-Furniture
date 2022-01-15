<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sky Furniture</title>
    <link rel="shortcut icon" href="{{asset('img/cloud.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/client.css')}}">
</head>
<body class="relative">
   <!-- loader -->
    <div id='loader-container'>
        <div id="loader-wrapper" class="fixed top-0 left-0 w-screen h-screen z-[250]">
            <div id="loader">  
                <img src="{{asset('img/logo.png')}}" alt="loader">        
            </div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    </div>
    <!-- content wrapper -->
    <div class="wrapper">
        <!-- header -->
        <header>
            <div>
                <a href="/index">
                    <img src="{{asset('img/logo_transparent.png')}}" alt="Sky" title="Sky Furniture">
                </a>
            </div>
            <div class="site-title">
                <span>SKY FURNITURE</span>
            </div>
            <div class="user-exten">
                <div class="notsign">
                    <a href="./login.html"><span>Log In</span></a>
                    <a href="./signup.html"><span>Sign UP</span></a>
                </div>
                <div class="sign">
                    <div>
                        <a href="./profile.html" title="Profile">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </a>
                    </div>
                    <div>
                        <a href="./favourite.html" title="Favorite">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </a>
                        <!-- budge -->
                        <div class="item-counter">
                            <span>10</span>
                        </div>
                    </div>
                    <div>
                        <a href="cart.html" title="Cart">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </a>
                        <!-- budge -->
                        <div class="item-counter">
                            <span>2</span>
                        </div>
                    </div>
                    <div id="logout" title="Logout">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    </div>
                </div>
                <div class="mode">
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                </div>
            </div>
        </header>
        <!-- To Page Top -->
        <div class="topscroll">
            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd"></path></svg>
        </div>
        <!-- navigation bar -->
        <nav>
            <div class="sidebar-triger">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </div>
            <div class="mainbar">
                <a href="/"><span>Home</span></a>
                <a href="about"><span>About</span></a>    
                <a href="contact"><span>Contact</span></a>
                <a href="#" class="searchTriger">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </a>
            </div>
        </nav>
        <!-- side bar -->
        <section class="sidebar-container">
            <div class="sidebar">
                <div class="closer">
                    <svg fill="no brne" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </div>
                <!-- main links -->
                <div class="main">
                    <a href="search"><span>Products</span></a>
                    <a href="search"><span>Rooms</span></a>
                    <a href="about#brands"><span>Brands</span></a>
                    <a href="customorder"><span>Custom Order</span></a>
                    <a href="search"><span>Offers</span></a>
                    <a href="search"><span>What's New</span></a>
                </div>
                <!-- additions links -->
                <div class="addition">
                    <a href="contact"><span>Contacts</span></a>
                    <a href="about#about"><span>About Sky</span></a>
                    <a href="about#policy"><span>Policy</span></a>
                    <a href="about#stores"><span>Stores</span></a>
                </div>
            </div>
        </section>
        <!-- search bar -->
        <section class="searchbar">
            <!-- Stander search bar -->
            <div class="content">
                <div>
                    <label>Search</label>
                    <input id="searchvalue" type="text" placeholder="Enter Model/Brand/Category Name">
                    <div class="btn">
                        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
                <div>
                    <!-- Advance Search Bar -->
                    <select class="catagoryselector" name="" id="" aria-placeholder="Choose Catagory">
                        <option value="" disabled selected>Select a Catagory</option>
                        <option value="">Chairs</option>
                        <option value="">Tables & Disks</option>
                        <option value="">Beds</option>
                        <option class="" value="">Bed Room</option>
                        <option value="">Dining Room</option>
                        <option value="">Children Room</option>
                        <option value="">Living Room</option>
                        <option value="">Balcony & Garden</option>
                    </select>
                </div>
            </div>
        </section>
        <!-- content -->
        <main>
            @yield('content')
        </main>
        <!-- addition links -->
        <footer>
            <div>
                <!-- sit addintional links -->
                <div class="additional">
                    <a href="contact"><span>Customer Service</span></a>
                    <a href="about#about"><span>About Sky</span></a>
                    <a href="about#stores"><span>Stores</span></a>
                    <a href="/"><span>Home</span></a>
                    <a href="about#policy"><span>Policy</span></a>
                </div>
                <!-- developer links -->
                <div class="dev">
                    <span>&copy;Mohamed.<sup>self</sup></span>
                    <a href="https://github.com/mohamedla" target="blank"><span>Github Profile</span></a>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/client/index.js')}}"></script>
    @yield('script')
</body>
</html>