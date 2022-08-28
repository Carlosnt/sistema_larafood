<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Qrcode</title>
</head>
<body>
    <div style="text-align: center;" class="visible-print">
        {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(300)->generate($uri) !!}
        <p>{{ $uri }}</p>
    </div>
</body>
</html>
