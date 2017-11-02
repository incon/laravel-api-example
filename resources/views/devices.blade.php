<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Devices</title>
    <link type="text/css" rel="stylesheet" href="{{ mix('/css/app.css') }}"/>
</head>
<body>
<h1>Devices</h1>
<div id="devices-component">
    <div class="devices" style="display: none">
        <!-- To be replaced via AJAX -->
    </div>
    <div class="loading">
        Loading...
    </div>
    <div class="empty message" style="display:none">
        <p>No devices found</p>
    </div>
    <div class="error message" style="display: none">
        <p>Check your internet connection and try again.</p>
        <a href="/">Refresh</a>
    </div>
</div>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
