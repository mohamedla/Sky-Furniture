<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sky Furniture</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/client.css')}}">
</head>
<body class="relative bg-white">
    <div class="signing">
        <!-- content -->
        <main>
            @yield('content')
        </main>
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/signing.js')}}"></script>
</body>
</html>