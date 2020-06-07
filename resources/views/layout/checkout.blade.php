<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>

    @include('includes.style')

</head>

<body>


    <!--  ======================= Start Header Area ============================== -->

    @include('includes.headertocheckout')

    <!--  ======================= End Header Area ============================== -->

    <!--  ======================= Start Main Area ================================ -->

    @yield('content')
    <!--  ======================= Footer Area =======================  -->
    @include('includes.footer')


    @include('includes.scripts')

    @stack('addon-script')

</body>

</html>
