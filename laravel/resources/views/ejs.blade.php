<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>EJS Home Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="/favicon.ico">
    <link href="{{ asset('css/ejs.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" rel="stylesheet">
    <script>
        window.dataLayer = window.dataLayer || [];
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>
<noscript>
    <strong>We're sorry but this app doesn't work properly without JavaScript enabled. Please enable it to
        continue.</strong>
</noscript>
<div id="ejs"></div>
<script>
    //global variable
    window.DOMAIN_API = "<?php echo env('DOMAIN_API') ? env('DOMAIN_API') : 'http://118.70.161.155:8880' ?>"
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- built files will be auto injected -->
<script src="{{ asset('js/ejs.js') }}?v=0.5"></script>
</body>
</html>
