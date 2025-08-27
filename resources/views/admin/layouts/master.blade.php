

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Panel')</title>
    <!-- Include your CSS files here -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <style>
        /* Example sidebar width */
        .sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            background: #343a40;
            color: white;
            overflow-y: auto;
        }

        /* Main content pushed right of sidebar */
        main {
            margin-left: 250px; /* same as sidebar width */
            padding: 20px;
            min-height: calc(100vh - 60px); /* subtract footer height */
        }

        /* Footer fixed height */
        footer {
            height: 60px;
            background: #f8f9fa;
            text-align: center;
            line-height: 60px;
            clear: both;
            position: relative;
            margin-left: 250px; /* same offset so footer aligns */
        }

        /* Navbar styling */
        nav.navbar {
            height: 60px;
            background: #007bff;
            color: white;
            line-height: 60px;
            padding: 0 20px;
            position: fixed;
            top: 0;
            left: 250px; /* to the right of sidebar */
            right: 0;
            z-index: 1030;
        }

        /* Content wrapper to push below navbar */
        .content-wrapper {
            padding-top: 60px; /* height of navbar */
        }
    </style>
</head>
<body>
    @include('admin.layouts.sidebar')

    @include('admin.layouts.navbar')

    <div class="content-wrapper">
        <main>
            @yield('content')
        </main>

        @include('admin.layouts.footer')
    </div>
</body>
</html>
