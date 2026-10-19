
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Coffee Space')</title>

    @include('layouts.admin.css')
</head>
<body>

    <div class="d-flex main-wrapper">

        @include('layouts.admin.sidebar')

        <div class="flex-grow-1">

            @include('layouts.admin.header')

            <main class="content-page">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close"
                                data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close"
                                data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')

            </main>

            @include('layouts.admin.footer')

        </div>
    </div>

    @include('layouts.admin.js')

</body>
</html>
