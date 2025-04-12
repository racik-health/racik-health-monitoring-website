<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Racik Health Monitoring')</title>
    @stack('stylesheet')
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('assets/icons/frontend/home/logo-racik.png') }}" alt="Logo Racik" class="logo">
        </div>

        <div class="content">
            @yield('content')
        </div>

        <div class="button-container">
            <a href="@yield('button')" class="button">Buka Dashboard Kamu</a>
        </div>

        <div class="footer">
            <p>Terima kasih telah menggunakan Racik Health Monitoring</p>
            <p>Tim Pencari Tuhan</p>
        </div>
    </div>
</body>

</html>
