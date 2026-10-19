
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Coffee Space')</title>

    @include('layouts.admin.css')
</head>
<body>
    @include('layouts.admin.header')

    <div class="d-flex">
        @include('layouts.admin.sidebar')

        <main class="container-fluid p-4">
            @yield('content')
        </main>
    </div>

    @include('layouts.admin.footer')
    @include('layouts.admin.js')
</body>
</html>
