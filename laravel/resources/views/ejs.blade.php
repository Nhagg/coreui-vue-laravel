<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>EJS Home Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="icon" href="/favicon.ico">
    <link href="{{ asset('css/ejs.css') }}" rel="stylesheet">
    <script>
        window.dataLayer = window.dataLayer || [];
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>
<noscript>
    <strong>We're sorry but this app doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
</noscript>
<div id="ejs"></div>
<!-- built files will be auto injected -->
<script src="{{ asset('js/ejs.js') }}"></script>

</body>
</html>
