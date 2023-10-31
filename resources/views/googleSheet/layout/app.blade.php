<!DOCTYPE html>
<html lang="en">

@include('googleSheet.layout.header')

<body>
    <div class="container mt-3">
        <h2>List of all records from google sheets</h2>

        {{-- @yield('response-message') --}}
        @include('googleSheet.layout.response-message')


        @yield('content')

    </div>

    @include('googleSheet.layout.app-js')

</body>

</html>
