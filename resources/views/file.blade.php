<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>File Manager</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/vendor/file-manager/css/file-manager.css') }}">
    <style>
        html, body {height: 100%;margin: 0;}
        .full-height {height: 100%;}
    </style>

</head>
<body>
<div class="full-height">
    <div id="fm"></div>
</div>
</body>
<script src="{{ asset('/vendor/file-manager/js/file-manager.js') }}"></script>
</html>
